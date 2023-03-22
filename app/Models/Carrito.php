<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class Carrito extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carritoDetail()
    {
        return $this->hasMany(CarritoDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function encontrarOCrear($carrito_id)
    {
        if($carrito_id)
        {
            return Carrito::find($carrito_id);
        }else{
            return Carrito::create();
        }
    }

    public static function encontrarOCrearPorUser($user)
    {
        $active = $user->carritos->where('estado','=','ACTIVO')->first();
        if ($active) {
            return $user->carritos->where('estado', '=', 'ACTIVO')->first();
        } else {
            return Carrito::create();
        }
    }

    public function cantidadProductos()
    {
        $total = $this->carritoDetail->sum('cantidad');
        return $total;
    }

    public function precio_total()
    {
        $total = 0;
        
        foreach ($this->carritoDetail as $key => $carrito_detail) {
            $total += $carrito_detail->precio * $carrito_detail->cantidad;
        }

        return $total;
    }

    public static function getCarritoSession()
    {
        $session_name = 'carrito_id';
        $carrito_id = Session::get($session_name);
        $carrito = self::encontrarOCrear($carrito_id);

        return $carrito;
    }

    public static function getUserCarritoSession()
    {
        $carrito = self::encontrarOCrearPorUser(Auth::user());
        return $carrito;
    }

    public function my_store($producto,$request)
    {
        if($producto->stock > 0)
        {
            $this->carritoDetail()->create([
                'cantidad' => $request->cantidad,
                'precio' => $producto->precio,
                'producto_id' => $producto->id
            ]);

            return true;
        }else
        {
            return false;
        }
    }

    public function store_producto($producto)
    {
        if ($producto->stock > 0) 
        {
            $this->carritoDetail()->create([
                'precio' => $producto->precio,
                'producto_id' => $producto->id
            ]);
            return true;
        } else {
            return false;
        }
    }
}
