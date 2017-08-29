<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdAllocationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprodallocationdetail', function (Blueprint $table) {
        $table->string('strProdAllocationID');
        $table->string('strProductID');
        $table->integer('intQtyToUse');
        $table->foreign('strProductID')
              ->references( 'strProductID')->on('tbljobticketdetail')
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
        Schema::dropIfExists('tblprodallocationdetail');
    }
}
