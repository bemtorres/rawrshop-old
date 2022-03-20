<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->string('codigo',50); //unico dentro del su mismo tenant
            $table->string('nombre',150);
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->json('assets')->nullable();
            $table->json('config')->nullable();
            $table->string('titulo_banner')->nullable();
            // $table->double('precio')->default(0);
            // $table->double('precio_descuento')->default(0);
            // $table->integer('stock')->default(0);
            // $table->integer('stock_critico')->default(0);
            $table->integer('id_categoria')->nullable();
            $table->integer('id_subcategoria')->nullable();
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('s_producto');
    }
}
