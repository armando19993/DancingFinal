<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_restaurantes', function (Blueprint $table) {
            $table->id();
            $table->integer('mesa_id');
            $table->integer('mozo_id');
            $table->integer('caja_id');
            $table->integer('status');
            $table->integer('total');
            $table->integer('tipo_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_restaurantes');
    }
}
