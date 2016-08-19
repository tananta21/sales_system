<?php

use Illuminate\Database\Seeder;
use App\Core\Modelo\Modelo;

class ModeloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modelo::create(array(
            'descripcion'=>'--------'
        ));
        Modelo::create(array(
            'descripcion'=>'pequeño'
        ));

        Modelo::create(array(
            'descripcion'=>'mediano'
        ));
        Modelo::create(array(
            'descripcion'=>'grande'
        ));

    }
}
