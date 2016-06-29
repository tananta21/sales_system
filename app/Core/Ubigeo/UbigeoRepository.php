<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 17/06/2016
 * Time: 12:35
 */

namespace App\Core\Ubigeo;

use App\Core\Contracts\BaseRepositoryInterface;

class UbigeoRepository implements BaseRepositoryInterface
{
    public function all()
    {
        return Ubigeo::all();
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

}