<?php

namespace App\Core\Marca;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function productos()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
