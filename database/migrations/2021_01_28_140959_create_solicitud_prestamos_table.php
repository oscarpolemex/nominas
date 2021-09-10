<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("servidor_publico_id");
            $table->foreign('servidor_publico_id')->references('id')->on('servidores_publicos');
            $table->string('ruta');
            $table->integer('estatus');
            $table->boolean('cita');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_prestamos');
    }
}
