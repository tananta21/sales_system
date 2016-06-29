<?php

use Illuminate\Database\Seeder;
use App\Core\Marca\Marca;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create(array(
            'descripcion'=>'vacio'
        ));
        Marca::create(array(
            'descripcion'=>'Yamaha'
        ));
        Marca::create(array(
            'descripcion'=>'zuzuki'
        ));
        Marca::create(array(
            'descripcion'=>'taiwan'
        ));
        Marca::create(array(
            'descripcion'=>'sfx'
        ));
        Marca::create(array(
            'descripcion'=>'honda'
        ));



    }
}
