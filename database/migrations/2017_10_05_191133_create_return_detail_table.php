<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblreturndetail', function (Blueprint $table) {
        $table->string('strReturnID');
        $table->string('strMaterialID');
        // $table->string('strReceivePurchaseID');
        $table->integer('quantityReturned');
        $table->boolean('isActive')->default(1);

        $table->foreign('strReturnID')
              ->references('strReturnID')->on('tblreturnheader')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strMaterialID')
              ->references( 'strMaterialID')->on('tblmaterial')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        // $table->foreign('strReceivePurchaseID')
        //       ->references( 'strReceivePurchaseID')->on('tblreceivepurchase')
        //       ->onUpdate('cascade')
        //       ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblreturndetail');
    }
}
