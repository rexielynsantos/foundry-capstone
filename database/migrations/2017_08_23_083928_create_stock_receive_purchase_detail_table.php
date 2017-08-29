<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockReceivePurchaseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstockreceivepurchase', function (Blueprint $table) {
        $table->string('strStocksID');
        $table->string('strReceivePurchaseID');
        $table->foreign('strStocksID')
              ->references('strStocksID')->on('tblstocks')
              ->onUpdate('cascade');
        $table->foreign('strReceivePurchaseID')
              ->references('strReceivePurchaseID')->on('tblreceivepurchase')
              ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblstockreceivepurchase');
    }
}
