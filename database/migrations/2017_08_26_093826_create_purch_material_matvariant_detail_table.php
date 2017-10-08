<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchMaterialMatvariantDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpurchmatvariantdetail', function (Blueprint $table) {
        $table->string('strPurchaseID');
        $table->string('strMaterialID');
        $table->string('strMaterialVariantID');
        $table->double('dblAddlQty');
        $table->double('totalQty');
        $table->double('dblMaterialCost');
        // $table->foreign('strMaterialVariantID')
        //       ->references('strMaterialVariantID')->on('tblmaterialdetail');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpurchmatvariantdetail');
    }
}
