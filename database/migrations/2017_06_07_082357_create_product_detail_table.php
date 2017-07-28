<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproductdetail', function (Blueprint $table)
        {   
            $table ->string('strProductVariantID');
            $table ->string('strProductID');
            $table->foreign('strProductVariantID')
                  ->references('strProductVariantID')->on('tblproductvariant')
                  ->onUpdate('cascade');
                  // ->onDelete('restrict');
            $table->foreign('strProductID')
                  ->references('strProductID')->on('tblproduct')
                  ->onUpdate('cascade');
                  // ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('tblproductdetail');
    }
}
