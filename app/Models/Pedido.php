<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estadopedido()
    {
        return $this->belongsTo(Estadopedido::class); 
    }

    public function boleta()
    {
        return $this->belongsTo(Boleta::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
