<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paciente', function (Blueprint $table) {
            $table->foreign('id_tipo_documento', 'paciente_ibfk_1')->references('id_tipo_documento')->on('tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paciente', function (Blueprint $table) {
            $table->dropForeign('paciente_ibfk_1');
        });
    }
}
