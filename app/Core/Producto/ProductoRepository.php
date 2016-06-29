<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 17/06/2016
 * Time: 13:27
 */

namespace App\Core\Producto;

use App\Core\Contracts\BaseRepositoryInterface;

class ProductoRepository implements BaseRepositoryInterface {

    public function all()
    {
        return Producto::all();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function updated($id, array $attributes)
    {
        // TODO: Implement updated() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        // TODO: Implement deleted() method.
    }

    public function addProducto($inputs){
        $producto = new Producto();
        $producto->marca_id = $inputs['marca'];
        $producto->categoria_id = $inputs['categoria'];
        $producto->modelo_id = $inputs['modelo'];
        $producto->codigo = $inputs['codigo'];
        $producto->nombre = $inputs['nombre'];
        $producto->descripcion = $inputs['descripcion'];
        $producto->stock_actual = $inputs['stock_actual'];
        $producto->stock_minimo = $inputs['stock_minimo'];
        $producto->stock_maximo = $inputs['stock_maximo'];
        $producto->save();
    }
}