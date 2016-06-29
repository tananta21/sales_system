<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 25/04/2016
 * Time: 22:54
 */

namespace App\Core\User;

use App\Core\Contracts\BaseRepositoryInterface;
use App\User;

class UserRepository implements BaseRepositoryInterface
{
//    private $model;
//
//


    public function all()
    {
        return User::all();
    }
    public function allNroDocumento()
    {
        return User::all('nro_documento');
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

    }

    public function addUser($tipo_usuario_id, $estado_civil_id, $grado_instruccion_id,
                            $ocupacion_id, $ubigeo_id, $nro_documento, $name, $apellido,
                            $sexo, $telefono, $email, $password)
    {

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