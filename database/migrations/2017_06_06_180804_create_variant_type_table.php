<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblvarianttype', function (Blueprint $table) {
        $table->string('strProductTypeID');
        $table->string('strProductVariantID');
        $table->foreign('strProductVariantID')
              ->references('strProductVariantID')->on('tblproductvariant')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strProductTypeID')
              ->references('strProductTypeID')->on('tblproducttype')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblvarianttype');
    }
}
