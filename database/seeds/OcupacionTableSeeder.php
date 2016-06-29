<?php

use Illuminate\Database\Seeder;
use App\Core\Ocupacion\Ocupacion;

class OcupacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ocupacion::create(array(
            'descripcion'=>'vacio'
        ));
        Ocupacion::create(array(
            'descripcion'=>'agricultor'
        ));
        Ocupacion::create(array(
            'descripcion'=>'ingeniero'
        ));
        Ocupacion::create(array(
            'descripcion'=>'mecanico'
        ));
        Ocupacion::create(array(
            'descripcion'=>'tecnico'
        ));
        Ocupacion::create(array(
            'descripcion'=>'otros'
        ));


    }
}
