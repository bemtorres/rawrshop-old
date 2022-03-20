<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnFormatJsonSCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('s_categoria', function (Blueprint $table) {
          $table->json('config')->nullable()->after('codigo');
        });

        Schema::table('s_subcategoria', function (Blueprint $table) {
          $table->json('config')->nullable()->after('codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('s_categoria', function (Blueprint $table) {
            $table->dropColumn(['config']);
        });

        Schema::table('s_subcategoria', function (Blueprint $table) {
          $table->dropColumn(['config']);
      });
    }
}
