<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'tipo_usuario_id'  => 1,
            'estado_civil_id'  => 1,
            'grado_instruccion_id'  => 1,
            'ocupacion_id'  => 1,
            'ubigeo_id'  => 1,
            'nro_documento'=>'72322246',
            'name'=>'kevin anthony',
            'apellido'=>'tananta del aguila',
            'sexo'=> 'm',
            'telefono'=>'942419909',
            'email'     => 'admin@admin.com',
            'direccion'=>'las malvinas',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}
