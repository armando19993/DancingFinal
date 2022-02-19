<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionAuditoriaInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_auditoria_inventarios', function (Blueprint $table) {
            $table->id();
            $table->integer('auditoria_id');
            $table->integer('cargado_por')->nullable();
            $table->integer('producto_id');
            $table->integer('debe_haber')->nullable();
            $table->integer('existencias')->nullable();
            $table->integer('diferencia')->nullable();
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
        Schema::dropIfExists('relacion_auditoria_inventarios');
    }
}
