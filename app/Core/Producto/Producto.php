<?php

namespace App\Core\Producto;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function marca()
    {
        return $this->belongsTo('App\Core\Marca\Marca');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Core\Categoria\Categoria');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Core\Modelo\Modelo');
    }

    public function scopeCodigo($query, $codigo)
    {
        if (trim($codigo) != "") {
            $query->where('codigo', 'LIKE', "%$codigo%");
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if (trim($nombre) != "") {
            $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

    public function scopeMarca($query, $marca)
    {
        if (trim($marca) != "") {
            $query->where('marca_id', '=', $marca);
        }
    }

    public function scopeCategoria($query, $categoria)
    {
        if (trim($categoria) != "") {
            $query->where('categoria_id', '=', $categoria);
        }
    }
    public function scopeModelo($query, $modelo){

        if (trim($modelo) != "") {
            $query->where('modelo_id', $modelo);
        }
    }


}
