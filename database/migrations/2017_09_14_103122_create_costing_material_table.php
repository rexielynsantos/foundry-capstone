<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostingMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcostingmaterial', function (Blueprint $table) {
        $table->string('strCostingID');
        $table->string('strMaterialID');
        // $table->string('strMaterialVariantID');
        // $table->string('strMatSpecID');
        $table->string('strUOMID');
        $table->double('dblMatCost');
        $table->double('dblUsage');
        $table->double('dblFinalCost');

        $table->foreign('strCostingID')
              ->references('strCostingID')->on('tblcosting')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strMaterialID')
              ->references('strMaterialID')->on('tblmaterial')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        // $table->foreign('strMaterialVariantID')
        //       ->references('strMaterialVariantID')->on('tblmaterialvariant')
        //       ->onUpdate('cascade')
        //       ->onDelete('restrict');
        $table->foreign('strUOMID')
              ->references('strUOMID')->on('tbluom')
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
        Schema::dropIfExists('tblcostingmaterial');
    }
}
