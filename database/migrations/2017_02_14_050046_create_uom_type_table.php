<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbluomtype', function (Blueprint $table) {
        $table->string('strUOMTypeID')->primary();
        $table->string('strUOMTypeName')->unique();
        $table->string('strUOMTypeDesc');
        $table->string('strStatus');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbluomtype');
    }
}
