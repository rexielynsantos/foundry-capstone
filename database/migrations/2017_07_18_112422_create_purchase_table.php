<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpurchase', function (Blueprint $table) {
        $table->string('strPurchaseID')->primary();
        $table->string('strSupplierID');
        $table->string('strSupplierContactPerson');
        $table->string('strPaymentTermID');
        $table->string('strPStatus');
        $table->foreign('strSupplierID')
          ->references('strSupplierID')->on('tblsupplier');
        $table->foreign('strPaymentTermID')
          ->references('strPaymentTermID')->on('tblpaymentterm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpurchase');
    }
}
