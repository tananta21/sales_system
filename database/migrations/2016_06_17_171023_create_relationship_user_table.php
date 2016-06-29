<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('estado_civil_id')
                ->references('id')->on('estado_civils')
                ->onDelete('cascade');

            $table->foreign('ocupacion_id')
                ->references('id')->on('ocupacions')
                ->onDelete('cascade');

            $table->foreign('grado_instruccion_id')
                ->references('id')->on('grado_instruccions')
                ->onDelete('cascade');

            $table->foreign('tipo_usuario_id')
                ->references('id')->on('tipo_usuarios')
                ->onDelete('cascade');

            $table->foreign('ubigeo_id')
                ->references('id')->on('ubigeos')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_estado_civil_id_foreign');
            $table->dropForeign('users_ocupacion_id_foreign');
            $table->dropForeign('users_grado_instruccion_id_foreign');
            $table->dropForeign('users_tipo_usuario_id_foreign');
            $table->dropForeign('users_ubigeo_id_foreign');
        });
    }
}
