<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    public function pedidos()
    {
        $pedidos = DB::select('select estadopedidos.estado, count(*) as veces from pedidos, estadopedidos where estadopedidos.id = pedidos.estadopedido_id group by pedidos.estadopedido_id, estado;');
        $puntos = [];
        foreach ($pedidos as $pedido) {
            $puntos[] = ['name' => $pedido->estado, 'y' => $pedido->veces];
        }
        return view('admin.graficos.pedidos', ["data" => json_encode($puntos)]);
    }

    public function productos()
    {
        $productos = DB::select('select p.name, sum(pp.cantidad) as cantidad from pedido_producto as pp inner join productos as p on p.id = pp.producto_id group by p.name order by cantidad desc limit 10;');
        $puntos = [];
        foreach ($productos as $producto) {
            $puntos[] = ['name' => $producto->name, 'y' => floatval($producto->cantidad)];
        }
        return view('admin.graficos.productos', ["data" => json_encode($puntos)]);
    }
}
