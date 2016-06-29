<?php

use Illuminate\Database\Seeder;
use App\Core\GradoInstruccion\GradoInstruccion;

class GradoInstruccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradoInstruccion::create(array(
            'descripcion'=>'vacio'
        ));
        GradoInstruccion::create(array(
            'descripcion'=>'inicial'
        ));
        GradoInstruccion::create(array(
            'descripcion'=>'primaria'
        ));
        GradoInstruccion::create(array(
            'descripcion'=>'secundaria'
        ));
        GradoInstruccion::create(array(
            'descripcion'=>'superior'
        ));


    }
}
