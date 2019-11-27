<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->integer('id_proceso')->unsigned();
            $table->foreign('id_proceso')->references('id')->on('procesos')->onDelete('cascade');
            $table->integer('id_proyecto')->unsigned();
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('documento');
            $table->string('nombre_documento');
            $table->enum('tipo' , ['Salida', 'Interno']);
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
