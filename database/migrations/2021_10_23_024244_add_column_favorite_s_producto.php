<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFavoriteSProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_producto', function (Blueprint $table) {
          $table->boolean('favorito_check')->default(false)->after('count_views');
          $table->integer('like')->default(0)->after('favorito_check');
          $table->integer('star')->default(0)->after('like');
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
          $table->dropColumn(['favorito_check','like','star']);
        });
    }
}
