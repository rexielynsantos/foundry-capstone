<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprodallocation', function (Blueprint $table) {
        $table->string('strProdAllocationID')->primary();
        $table->string('strJobOrderID');
        $table->string('strStageID');
        $table->foreign('strJobOrderID')
              ->references('strJobOrderID')->on('tblquotejoborder')
              ->onUpdate('cascade');
        $table->foreign('strStageID')
              ->references('strStageID')->on('tblstage')
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
        Schema::dropIfExists('tblprodallocation');
    }
}
