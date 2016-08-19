<?php

namespace App\Core\Categoria;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function productos()
    {
        return $this->hasMany('App\Core\Producto\Producto');
    }
}
