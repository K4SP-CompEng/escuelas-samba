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
        Schema::create('jam_samba', function (Blueprint $table) {
            $table->integer('id_samba')->primary();
            $table->string('nombre', 50);
            $table->string('letra', 1200);
            $table->date('fecha_carnaval');
            $table->string('tipo', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_samba');
    }
};
