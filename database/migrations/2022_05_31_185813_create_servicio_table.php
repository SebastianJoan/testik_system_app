<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->string('id_servicios')->unique();
            $table->string('id_clientes');
            $table->string('lugar');
            $table->string('descripcion',500)->nullable();
            $table->timestamps();
        });

        Schema::table('servicios', function (Blueprint $table) {
            $table->foreign('id_clientes')->references('id_clientes')->on('clientes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
