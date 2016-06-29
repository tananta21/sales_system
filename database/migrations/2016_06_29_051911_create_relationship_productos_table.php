<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('marca_id')
                ->references('id')->on('marcas')
                ->onDelete('cascade');

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade');

            $table->foreign('modelo_id')
                ->references('id')->on('modelos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_marca_id_foreign');
            $table->dropForeign('productos_categoria_id_foreign');
            $table->dropForeign('productos_modelo_id_foreign');
        });
    }
}
