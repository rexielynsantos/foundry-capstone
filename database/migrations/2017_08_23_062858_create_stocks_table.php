<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstocks', function (Blueprint $table) {
        $table->string('strStocksID')->primary();
        $table->string('strMaterialID');
        $table->foreign('strMaterialID')
              ->references('strMaterialID')->on('tblmaterial')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblstocks');
    }
}
