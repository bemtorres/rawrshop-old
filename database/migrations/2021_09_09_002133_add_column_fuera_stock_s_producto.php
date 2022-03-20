<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFueraStockSProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_producto', function (Blueprint $table) {
          $table->boolean('fuera_stock')->default(false)->after('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_producto', function (Blueprint $table) {
          $table->dropColumn(['fuera_stock']);
        });
    }
}
