<?php

namespace App\Http\Controllers;

use App\Models\Estadopedido;
use App\Models\Pedido;
use App\Models\Regione;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pedidos.index')->only('index');
        $this->middleware('can:pedidos.create')->only('create', 'store');
        $this->middleware('can:pedidos.edit')->only('edit', 'update');
        $this->middleware('can:pedidos.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $estadopedidos = Estadopedido::all();
        $pedidos = Pedido::where('estadopedido_id', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate();
        
        return view('admin.pedidos.index', compact('pedidos','estadopedidos','search'));
    }

    public function create()
    {
        $estadopedidos = Estadopedido::all();
        $users = User::where('estado', '=', '1')->get();
        
        return view('admin.pedidos.create', compact('estadopedidos', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fechaCreacion' => 'required|date',
            'fechaEnvio' => 'required|date',
            'fechaEntrega' => 'required|date',
            'estadopedido_id' => 'required',
            'user_id' => 'required',
        ]);

        $pedido = Pedido::create($request->all());

        return redirect()->route('users.index')->with('datos', 'Registro Guardado !! ...')->with('estilo', 'success');
    }

    public function edit(Pedido $pedido)
    {
        $estadopedidos = Estadopedido::all();

        return view('admin.pedidos.edit', compact('estadopedidos', 'pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'fechaEntrega' => 'required|date',
            'estadopedido_id' => 'required',
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('datos', 'Registro Actualizado !! ...')->with('estilo', 'success');
    }

    public function destroy(User $user)
    {
        $user->estado = '0';
        $user->save();

        return redirect()->route('pedidos.index');
    }

    public function reportes()
    {
        $pedidos = Pedido::all();

        return view('admin.reportes.verReportes', compact('pedidos'));
    }
}
