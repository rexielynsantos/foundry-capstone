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
        $table->integer('quantityReceived');
        $table->integer('qtyReturned')->default(0);
        $table->boolean('isActive')->default(1);
        $table->timestamps();
        $table->foreign('strReceivePurchaseID')
          ->references('strReceivePurchaseID')->on('tblreceivepurchase')
          ->onUpdate('cascade')
          ->onDelete('restrict');
           $table->foreign('strMaterialID')
          ->references('strMaterialID')->on('tblmaterial')
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
        Schema::dropIfExists('tblreceivepurchasedetail');
    }
}

