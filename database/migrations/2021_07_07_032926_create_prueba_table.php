<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prueba', function (Blueprint $table) {
            $table->increments('id_prueba');
            $table->unsignedInteger('id_tipo_prueba')->index('id_tipo_prueba');
            $table->date('fecha_servicio');
            $table->date('fecha_resultado')->nullable();
            $table->unsignedInteger('id_empresa')->index('id_empresa');
            $table->unsignedInteger('id_paciente')->index('id_paciente');
            $table->unsignedInteger('id_funcionario')->index('id_funcionario');
            $table->string('nro_servicio', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prueba');
    }
}
