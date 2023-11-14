<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->text('tipo_comprobante');
            $table->text('nro_comprobante');
            $table->date('fecha_operacion');
            /* $table->unsignedBigInteger('id_clientes');
            $table->foreign('id_clientes')->references('id')->on('clientes');
            $table->unsignedBigInteger('id_productos');
            $table->foreign('id_productos')->references('id')->on('productos'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_ventas');
    }
};
