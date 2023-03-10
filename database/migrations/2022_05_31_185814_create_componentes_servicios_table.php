<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentesServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes_servicios', function (Blueprint $table) {
            $table->string('id_componente_servicio')->unique();
            $table->string('id_servicios');
            $table->string('id_componentes');
            $table->timestamps();
        });

        Schema::table('componentes_servicios', function (Blueprint $table) {
            $table->foreign('id_servicios')->references('id_servicios')->on('servicios');
        });

        Schema::table('componentes_servicios', function (Blueprint $table) {
            $table->foreign('id_componentes')->references('id_componentes')->on('componentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componentes_servicios');
    }
}
