<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Category;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use App\Models\Regione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;

class FrontController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->search;

        $productos = Producto::where('estado', '=', '1')->where('stock','>','0')->where('category_id', 'like', '%' . $search . '%')->orderBy('id', 'asc')->paginate();
        $categories = Category::where('estado', '=', '1')->get();

        return view('user.index', compact('productos','categories','search'));
    }

    public function show(Producto $producto)
    {
        $productos = Producto::where('estado', '=', '1')->where('category_id', 'like', '%' . $producto->category_id . '%')->where('id','!=',$producto->id)->get()->take(4);

        return view('user.show', compact('productos','producto'));
    }

    public function registrar()
    {
        $regiones = Regione::where('estado', '=', '1')->get();

        return view('user.register',compact('regiones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'calle' => 'required',
            'distrito' => 'required',
            'numero' => 'required|numeric',
            'regione_id' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->calle = $request->calle;
        $user->distrito = $request->distrito;
        $user->numero = $request->numero;
        $user->regione_id = $request->regione_id;
        $user->save();
        $user->assignRole('Usuario');

        Auth::login($user);

        $carrito = Carrito::getCarritoSession();
        $carrito->update([
            'user_id' => $user->id,
        ]);

        return redirect()->route('home');
    }

    public function createPedido(Carrito $carrito)
    {
        $productos = DB::select('select p.name, cp.producto_id,sum(cp.cantidad) as cantidad, cp.precio from carrito_producto as cp,productos as p where cp.producto_id = p.id and cp.carrito_id = ' . $carrito->id . ' group by p.name,cp.producto_id,cp.precio;');
        
        if ($productos) {
            $pedido = Pedido::create([
                'fechaCreacion' => now(),
                'fechaEnvio' => now()->addDays(1),
                'fechaEntrega' => now()->addDays(6),
                'estadopedido_id' => '1',
                'user_id' => $carrito->user_id
            ]);
            
            foreach ($productos as $p) {
                PedidoProducto::create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $p->producto_id,
                    'cantidad' => $p->cantidad,
                    'precio' => $p->precio
                ]);

                $product = Producto::find($p->producto_id);
                $nuevostock = $product->stock - $p->cantidad;
                $product->stock = $nuevostock;
                $product->save();
            }
            
            $carrito->update(['estado' => 'PENDIENTE']);
            Session::forget('carrito_id');

            $nuevoCarrito = Carrito::getCarritoSession();
            $nuevoCarrito->update([
                'user_id' => Auth::id(),
            ]);
            
            return redirect()->route('reporte.pedido', $pedido->id);
        }
        
        return redirect()->route('home')->with('error', 'Comienza comprando algo!...');
    }

    public function generarReporte($id)
    {
        $pedido = Pedido::find($id);
        $user = Auth::user();
        $productos = DB::select('select cantidad,pedido_producto.precio,productos.name,producto_id from pedido_producto inner join productos on producto_id=productos.id where pedido_id = '.$id.';');

        $data = compact('pedido','user','productos');


        $pdf = PDF::loadView('pdf.reportePedido', $data);

        return $pdf->stream();
    }

    public function verpedidos(User $user)
    {
        $pedidos = Pedido::where('user_id','=',$user->id)->get();

        return view('user.verPedidos',compact('pedidos'));
    }

    public function reporte()
    {
        $pdf = PDF::loadView('pdf.reporte');

        return $pdf->stream();
    }
}
