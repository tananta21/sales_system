<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(EstadoCivilTableSeeder::class);
         $this->call(GradoInstruccionTableSeeder::class);
         $this->call(OcupacionTableSeeder::class);
         $this->call(TipoUsuarioTableSeeder::class);
         $this->call(UbigeoTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(MarcaTableSeeder::class);
         $this->call(CategoriaTableSeeder::class);
         $this->call(ModeloTableSeeder::class);
         $this->call(ProductoTableSeeder::class);



        Model::reguard();
    }
}
