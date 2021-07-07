<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPruebaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prueba', function (Blueprint $table) {
            $table->foreign('id_tipo_prueba', 'prueba_ibfk_1')->references('id_tipo_prueba')->on('tipo_prueba');
            $table->foreign('id_paciente', 'prueba_ibfk_2')->references('id_paciente')->on('paciente');
            $table->foreign('id_funcionario', 'prueba_ibfk_3')->references('id_funcionario')->on('funcionario');
            $table->foreign('id_empresa', 'prueba_ibfk_4')->references('id_empresa')->on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prueba', function (Blueprint $table) {
            $table->dropForeign('prueba_ibfk_1');
            $table->dropForeign('prueba_ibfk_2');
            $table->dropForeign('prueba_ibfk_3');
            $table->dropForeign('prueba_ibfk_4');
        });
    }
}
