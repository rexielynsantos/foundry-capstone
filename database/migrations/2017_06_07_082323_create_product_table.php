<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproduct', function (Blueprint $table) {
        $table->string('strProductID')->primary();
        $table->string('strProductName')->unique();
        $table->string('strProductTypeID');
        $table->string('strProductImagePath')->nullable();
        $table->string('strTempImage')->nullable();
        $table->text('strProductDesc')->nullable();
        $table->string('strStatus');
        $table->foreign('strProductTypeID')
              ->references('strProductTypeID')->on('tblproducttype')
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
        Schema::dropIfExists('tblproduct');
    }
}
