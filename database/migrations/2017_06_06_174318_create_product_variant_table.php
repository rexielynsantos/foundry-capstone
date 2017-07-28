<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproductvariant', function (Blueprint $table) {
        $table->string('strProductVariantID')->primary();
        $table->integer('intVariantQty');
        $table->string('strUOMID');
        $table->text('strProductVariantDesc')->nullable();
        $table->string('strStatus');
        $table->foreign('strUOMID')
              ->references('strUOMID')->on('tbluom')
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
        Schema::dropIfExists('tblproductvariant');
    }
}
