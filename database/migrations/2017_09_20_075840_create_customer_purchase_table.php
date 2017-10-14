<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('tblcustpurchase', function (Blueprint $table) {
        $table->string('strCustPurchaseID')->primary();
        $table->string('strPOID');
        $table->date('dtOrderDate');
        $table->date('dtDeliveryDate');
        $table->string('strCustomerID');
        $table->string('strQuoteID');
        $table->string('strSOStatus');
        $table->timestamps();
        $table->foreign('strCustomerID')
              ->references('strCustomerID')->on('tblcustomer')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strQuoteID')
              ->references('strQuoteID')->on('tblquotation')
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
        Schema::dropIfExists('tblcustpurchase');
    }
}
