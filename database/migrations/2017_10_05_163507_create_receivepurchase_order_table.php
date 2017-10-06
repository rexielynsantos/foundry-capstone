<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivepurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreceivepurchaseorder', function (Blueprint $table) {
        $table->string('strReceivePurchaseID');
        $table->string('strPurchaseID');
         $table->foreign('strReceivePurchaseID')
          ->references('strReceivePurchaseID')->on('tblreceivepurchase');
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
        Schema::dropIfExists('tblreceivepurchaseorder');
    }
}
