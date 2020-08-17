<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServidorPublicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servidores_publicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('curp');
            $table->string('c_electronico')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('extension_contacto')->nullable();
            $table->boolean('verificado')->default(false);
            $table->boolean('registrado')->default(false);
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
        Schema::dropIfExists('servidores_publicos');
    }
}
