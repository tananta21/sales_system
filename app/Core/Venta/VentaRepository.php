<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 20/07/2016
 * Time: 16:50
 */

namespace App\Core\Venta;


use App\Core\Contracts\BaseRepositoryInterface;

class VentaRepository implements BaseRepositoryInterface
{

    public function all()
    {
        return Venta::all('id')->last();
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

    public function addVenta($cliente, $empleado){
        $venta = new Venta();
        $venta->cliente_id = $cliente;
        $venta->empleado_id = $empleado;
        $venta->save();
    }
}