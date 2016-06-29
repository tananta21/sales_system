<?php

use Illuminate\Database\Seeder;
use App\Core\TipoUsuario\TipoUsuario;

class TipoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create(array(
            'descripcion'=>'administrador'
        ));
        TipoUsuario::create(array(
            'descripcion'=>'vendedor'
        ));
        TipoUsuario::create(array(
            'descripcion'=>'cajero'
        ));


    }
}
