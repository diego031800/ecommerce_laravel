<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadopedido extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
