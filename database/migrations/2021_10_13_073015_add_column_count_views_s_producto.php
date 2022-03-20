<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCountViewsSProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_producto', function (Blueprint $table) {
          $table->integer('count_views')->default(0)->after('id_subcategoria');
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
          $table->dropColumn(['count_views']);
        });
    }
}
