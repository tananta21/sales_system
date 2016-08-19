<?php

use Illuminate\Database\Seeder;
use App\Core\Cliente\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(array(
            'nombres'=>'kevin',
            'apellidos'=>'tananta',
            'telefono'=>'111111',
        ));
    }
}
