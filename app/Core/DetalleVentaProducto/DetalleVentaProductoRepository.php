<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 20/07/2016
 * Time: 16:58
 */

namespace App\Core\DetalleVentaProducto;


use App\Core\Contracts\BaseRepositoryInterface;

class DetalleVentaProductoRepository implements BaseRepositoryInterface
{

    public function all()
    {
        // TODO: Implement all() method.
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

    public function addDetalleVenta($nro_venta,$id, $price, $qy)
    {
        $venta = new DetalleVentaProducto();
        $venta->venta_id = $nro_venta;
        $venta->producto_id = $id;
        $venta->precio = $price;
        $venta->cantidad = $qy;
        $venta->save();

    }
}