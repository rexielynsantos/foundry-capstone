<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprodinspection', function (Blueprint $table) {
        $table->string('strProdInspectionID')->primary();
        $table->string('strEmployeeID')->nullable();
        $table->string('strProductID')->unique();
        $table->time('timeInspected')->nullable();       
        $table->integer('forInspection')->nullable()->default('0');
        $table->integer('intAcceptHardness')->nullable()->default('0');
        $table->integer('intAcceptQty')->nullable()->default('0');
        $table->integer('intReworkHardness')->nullable()->default('0');
        $table->integer('intReworkQty')->nullable()->default('0');
        $table->foreign('strEmployeeID')
              ->references('strEmployeeID')->on('tblemployee')
              ->onUpdate('cascade');
        // $table->foreign('strProductID');
              // ->references('strProductID')->on('tbljobticketdetail')
              // ->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblprodinspection');
    }
}
