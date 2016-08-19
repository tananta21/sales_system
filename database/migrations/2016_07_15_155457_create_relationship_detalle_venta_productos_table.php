<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationshipDetalleVentaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_venta_productos', function (Blueprint $table) {
            $table->foreign('producto_id')
                ->references('id')->on('productos')
                ->onDelete('cascade');

            $table->foreign('venta_id')
                ->references('id')->on('ventas')
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
        Schema::table('detalle_venta_productos', function (Blueprint $table) {
            $table->dropForeign('detalle_venta_productos_producto_id_foreign');
            $table->dropForeign('detalle_venta_productos_venta_id_foreign');
        });
    }
}
