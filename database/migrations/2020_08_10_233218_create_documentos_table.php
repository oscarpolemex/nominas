<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('servidor_publico_id')->comment('Fk de la tabla servidores publicos');
            $table->foreign('servidor_publico_id')->references('id')->on('servidores_publicos');
            $table->string('nombre');
            $table->string('ruta');
            $table->unsignedBigInteger('recibo_id')->comment('Fk de la tabla servidores publicos');
            $table->foreign('recibo_id')->references('id')->on('recibos');
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
        Schema::dropIfExists('documentos');
    }
}
