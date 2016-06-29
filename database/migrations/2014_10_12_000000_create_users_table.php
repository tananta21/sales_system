<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_usuario_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->integer('grado_instruccion_id')->unsigned();
            $table->integer('ocupacion_id')->unsigned();
            $table->integer('ubigeo_id')->unsigned();
            $table->string('nro_documento',14)->unique();
            $table->string('name',50);
            $table->string('apellido',100);
            $table->string('sexo',1);
            $table->string('telefono',20);
            $table->string('email',100)->unique();
            $table->string('direccion',100);
            $table->string('password');
            $table->rememberToken();
//            $table->enum('type',['member','admin'])->default('member');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
