<?php

use Illuminate\Database\Seeder;
use App\Core\Ubigeo\Ubigeo;

class UbigeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubigeo::create(array(
            'departamento'=>'vacio',
            'provincia'=>'vacio',
            'distrito'=>'vacio',
            'numubigeo'=>'vacio'
        ));
    }
}
