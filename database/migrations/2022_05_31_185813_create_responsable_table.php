<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->string('id_responsable')->unique();
            $table->string('id_cargo');
            $table->string('nombre');
            $table->string('urlImage')->nullable();
            $table->timestamps();
        });

        Schema::table('responsables', function (Blueprint $table) {
            $table->foreign('id_cargo')->references('id_cargo')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
