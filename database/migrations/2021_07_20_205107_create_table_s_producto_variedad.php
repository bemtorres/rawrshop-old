<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSProductoVariedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_producto_variedad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->references('id')->on('s_producto');
            $table->foreignId('id_usuario')->references('id')->on('s_usuario');
            $table->string('codigo',100);
            $table->string('nombre',100)->nullable();
            $table->string('descripcion')->nullable();
            $table->json('assets')->nullable();
            $table->double('precio')->nullable();
            $table->double('precio_descuento')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('stock_critico')->nullable();
            $table->integer('posicion');
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
        Schema::dropIfExists('s_producto_tipo');
    }
}
