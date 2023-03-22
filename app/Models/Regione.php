<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function proveedores()
    {
        return $this->hasMany(Proveedore::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
