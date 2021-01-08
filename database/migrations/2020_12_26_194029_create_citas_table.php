<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("eventos_id")->unsigned();
            $table->foreign('eventos_id')->references('id')->on('eventos');
            $table->bigInteger("servidor_publico_id")->unsigned();
            $table->foreign('servidor_publico_id')->references('id')->on('servidores_publicos');
            $table->date("fecha_cita");
            $table->dateTime("fecha_hora_cita");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
