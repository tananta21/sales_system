<?php

use Illuminate\Database\Seeder;
use App\Core\Producto\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create(array(
            'marca_id'=>1,
            'categoria_id'=>1,
            'modelo_id'=>1,
            'codigo'=>'12345678',
            'nombre'=>'el primer producto',
            'stock_actual'=>10,
            'stock_minimo'=>5,
            'stock_maximo'=>15,
            'descripcion'=>'este es una prueba',
            'estado'=>1,
        ));
    }
}
