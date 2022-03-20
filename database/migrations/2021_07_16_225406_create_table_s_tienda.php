<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSTienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_tienda', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rubro')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('logo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('tipo')->nullable();
            $table->json('config')->nullable();
            $table->json('integration')->nullable();
            $table->json('assets')->nullable();
            $table->integer('estado')->default(1);
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('s_tienda');
    }
}
