<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'carrito_producto';

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
