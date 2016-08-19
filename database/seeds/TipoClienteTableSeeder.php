<?php

use Illuminate\Database\Seeder;
use App\Core\TipoCliente\TipoCliente;

class TipoClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCliente::create(array(
            'descripcion'=>'natural'
        ));
        TipoCliente::create(array(
            'descripcion'=>'juridico'
        ));

    }
}
