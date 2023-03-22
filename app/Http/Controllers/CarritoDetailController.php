<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetail;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarritoDetailController extends Controller
{
    public function store(Request $request, Producto $producto)
    {
        $carrito = Carrito::getCarritoSession();
        if ($carrito->my_store($producto,$request))
        {
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Disculpa no contamos con esa cantidad en el stock');
    }

    public function destroy($producto_id, $id)
    {
        DB::delete('delete from carrito_producto where producto_id = '.$producto_id.' and carrito_id = '.$id.';');

        return redirect()->back();
    }

    public function storeproducto(Producto $producto)
    {
        $carrito = Carrito::getCarritoSession();
        if ($carrito->store_producto($producto)) 
        {
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Disculpa no contamos con esa cantidad en el stock');
    }

    public function detalles()
    {
        $carrito = Carrito::getCarritoSession();
        $details = DB::select('select p.name, cp.producto_id,sum(cp.cantidad) as cantidad, cp.precio from carrito_producto as cp,productos as p where cp.producto_id = p.id and cp.carrito_id = '.$carrito->id.' group by p.name,cp.producto_id,cp.precio;');

        return view('user.detail', compact('carrito','details'));
    }
}
