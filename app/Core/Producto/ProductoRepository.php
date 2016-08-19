<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 17/06/2016
 * Time: 13:27
 */

namespace App\Core\Producto;

use App\Core\Contracts\BaseRepositoryInterface;

class ProductoRepository implements BaseRepositoryInterface
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }

    public function all()
    {
        return $this->producto->paginate(10);
    }
    public function buscarEnVentas($dato){
        if (trim($dato) != "") {
            return $this->producto->select('codigo', 'nombre', 'stock_actual','precio','id')
                ->where('codigo', $dato)
                ->orWhere('nombre', 'like', "%$dato%")
                ->get();
        }
        return array();

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
        $producto = Producto::find($id);
        $producto->marca_id = $attributes['marca'];
        $producto->categoria_id = $attributes['categoria'];
        $producto->modelo_id = $attributes['modelo'];
        $producto->codigo = $attributes['codigo'];
        $producto->nombre = $attributes['nombre'];
        $producto->descripcion = $attributes['descripcion'];
        $producto->stock_actual = $attributes['stock_actual'];
        $producto->stock_minimo = $attributes['stock_minimo'];
        $producto->stock_maximo = $attributes['stock_maximo'];
        $producto->estado = $attributes['estado'];
        $producto->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $producto = Producto::findOrFail($id);
        return $producto;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleted($id)
    {
        Producto::destroy($id);
    }

    public function addProducto($inputs)
    {
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
        $producto->estado = $inputs['estado'];
        $producto->save();
    }

    public function buscarProducto($data)
    {
        return $this->producto
            ->codigo($data['codigo'])
            ->nombre($data['nombre'])
            ->marca($data['marca'])
            ->categoria($data['categoria'])
            ->modelo($data['modelo'])
            ->paginate();
    }


}