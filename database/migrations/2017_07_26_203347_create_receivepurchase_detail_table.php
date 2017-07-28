<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivepurchaseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreceivepurchasedetail', function (Blueprint $table) {
        $table->string('strReceivePurchaseID');
        $table->string('strMaterialID');
        $table->integer('intQtyReceived');
        $table->string('strUOMID');
        $table->integer('intQtyLeft');
        $table->foreign('strMaterialID')
          ->references('strMaterialID')->on('tblpurchasedetail');
         $table->foreign('strUOMID')
          ->references('strUOMID')->on('tbluom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblreceivepurchasedetail');
    }
}
