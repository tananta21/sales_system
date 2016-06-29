<?php

use Illuminate\Database\Seeder;
use App\Core\EstadoCivil\EstadoCivil;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCivil::create(array(
            'descripcion'=>'vacio'
        ));
        EstadoCivil::create(array(
            'descripcion'=>'soltero'
        ));
        EstadoCivil::create(array(
            'descripcion'=>'casado'
        ));
        EstadoCivil::create(array(
            'descripcion'=>'divorciado'
        ));
        EstadoCivil::create(array(
            'descripcion'=>'viudo'
        ));


    }
}
