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
        Schema::table('jam_hab_colab', function (Blueprint $table) {
            $table->foreign(['cod_colab'], 'fk_cod_colab')->references(['id_colaborador'])->on('jam_colaborador');
            $table->foreign(['id_hab'], 'fk_id_habilidad')->references(['id_hab'])->on('jam_habilidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jam_hab_colab', function (Blueprint $table) {
            $table->dropForeign('fk_cod_colab');
            $table->dropForeign('fk_id_habilidad');
        });
    }
};
