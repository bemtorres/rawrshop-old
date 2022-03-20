<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePPagina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_pagina', function (Blueprint $table) {
          $table->id();
          $table->foreignId('id_usuario')->references('id')->on('s_usuario');
          $table->string('code')->unique();
          $table->string('titulo');
          $table->integer('posicion');
          $table->json('contenido')->nullable();
          $table->json('config')->nullable();
          $table->integer('estado')->default(1);
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
      Schema::dropIfExists('p_pagina');
    }
}
