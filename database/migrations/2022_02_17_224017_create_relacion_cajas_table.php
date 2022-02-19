<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_cajas', function (Blueprint $table) {
            $table->id();
            $table->integer('caja_id');
            $table->integer('producto_id');
            $table->integer('inicio');
            $table->integer('vendidos')->nullable();
            $table->integer('cortesias')->nullable();
            $table->integer('fin')->nullable();
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
        Schema::dropIfExists('relacion_cajas');
    }
}
