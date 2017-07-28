<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreceivepurchase', function (Blueprint $table) {
        $table->string('strReceivePurchaseID')->primary();
        $table->string('strPurchaseID');
        $table->date('dtDeliveryReceived');
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
        Schema::dropIfExists('tblreceivepurchase');
    }
}
