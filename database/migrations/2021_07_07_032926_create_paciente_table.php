<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('id_paciente');
            $table->string('nombre', 30)->default('');
            $table->string('identificacion', 10)->default('');
            $table->string('direccion', 50)->nullable();
            $table->string('genero', 10)->default('');
            $table->integer('edad');
            $table->string('telefono', 15)->nullable();
            $table->unsignedInteger('id_tipo_documento')->index('id_tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
