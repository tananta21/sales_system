<?php

namespace App\Http\Traits;
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 06/07/2016
 * Time: 9:59
 */

trait FormsElements
{

    public function createSelect(array $data)
    {
        $html = "<select>";
        for ($i=0;$i<count($data);$i++) {
            $html = $html ."<option>".$data[$i]['descripcion']."</option>";
        }
        $html = $html."</select>";

        return $html;
    }
}