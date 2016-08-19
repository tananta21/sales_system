<?php

namespace App\Core\Modelo;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    public function productos()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
