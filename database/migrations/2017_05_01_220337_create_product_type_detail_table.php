<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproducttypedetail', function (Blueprint $table)
        {   
            $table ->string('strStageID');
            $table ->string('strProductTypeID');
            $table->foreign('strStageID')
                  ->references('strStageID')->on('tblstage')
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
        Schema::dropIfExists('tblproducttypedetail');
    }
}
