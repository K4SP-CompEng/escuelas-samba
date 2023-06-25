<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jam_parentesco', function (Blueprint $table) {
            $table->foreign(['id_colaborador'], 'fk_id_colaborador')->references(['id_colaborador'])->on('jam_colaborador');
            $table->foreign(['id_pariente'], 'fk_id_pariente')->references(['id_colaborador'])->on('jam_colaborador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_parentesco', function (Blueprint $table) {
            $table->dropForeign('fk_id_colaborador');
            $table->dropForeign('fk_id_pariente');
        });
    }
};
