<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function proveedore()
    {
        return $this->belongsTo(Proveedore::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}
