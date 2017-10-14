<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpurchasedetail', function (Blueprint $table) {
        $table->string('strPurchaseID');
        $table->string('strMaterialID');
        $table->timestamps();
        $table->foreign('strMaterialID')
          ->references('strMaterialID')->on('tblmaterial');
        $table->foreign('strPurchaseID')
                  ->references('strPurchaseID')->on('tblpurchase');
        


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpurchasedetail');
    }
}
