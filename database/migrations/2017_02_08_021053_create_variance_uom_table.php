<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVarianceUomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblvariancematerial', function (Blueprint $table) {
        $table->string('strProductVarianceID');
        $table->string('strMaterialID');
        $table->string('strVarianceMaterialQty');
        // $table->foreign('strProductVarianceID')
        //       ->references('strProductVarianceID')->on('tblproductvariance')
        //       ->onUpdate('cascade')
        //       ->onDelete('restrict');
        // $table->foreign('strMaterialID')
        //       ->references('strMaterialID')->on('tblmaterial')
        //       ->onUpdate('cascade')
        //       ->onDelete('restrict');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('tblvariancematerial');
    }
}
