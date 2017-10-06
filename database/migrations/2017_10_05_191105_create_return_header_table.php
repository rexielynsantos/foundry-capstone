<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreturnheader', function (Blueprint $table) {
        $table->string('strReturnID')->primary();
        $table->string('strSupplierID');
        $table->string('strReceivePurchaseID');
        $table->date('dateReturned');

        $table->foreign('strSupplierID')
              ->references('strSupplierID')->on('tblsupplier')
              ->onUpdate('cascade');
        $table->foreign('strReceivePurchaseID')
              ->references( 'strReceivePurchaseID')->on('tblreceivepurchase')
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
        Schema::dropIfExists('tblreturnheader');
    }
}
