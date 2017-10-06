<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreturnmaterial', function (Blueprint $table) {
        $table->string('strReturnID');
        $table->string('strReceivePurchaseID');
        $table->timestamps();
        $table->foreign('strReturnID')
              ->references('strReturnID')->on('tblreturnheader')
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
        Schema::dropIfExists('tblreturnmaterial');
    }
}
