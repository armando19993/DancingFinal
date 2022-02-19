<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_inventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id');
            $table->integer('tipo_gestion');
            $table->integer('local_salida');
            $table->integer('local_entrada');
            $table->date('fecha_emision');
            $table->date('fecha_entrega');
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
        Schema::dropIfExists('gestion_inventarios');
    }
}
