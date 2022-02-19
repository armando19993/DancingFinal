<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionGestionInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_gestion_inventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('gestion_id');
            $table->integer('producto_id');
            $table->integer('cantidad');
            $table->integer('cantidad_entregada');
            $table->integer('por_entregar');
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
        Schema::dropIfExists('relacion_gestion_inventarios');
    }
}
