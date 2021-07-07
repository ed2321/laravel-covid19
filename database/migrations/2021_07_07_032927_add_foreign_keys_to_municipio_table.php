<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('municipio', function (Blueprint $table) {
            $table->foreign('id_departamento', 'municipio_ibfk_1')->references('id_departamento')->on('departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('municipio', function (Blueprint $table) {
            $table->dropForeign('municipio_ibfk_1');
        });
    }
}
