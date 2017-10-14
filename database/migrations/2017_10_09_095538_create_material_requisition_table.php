<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialRequisitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmaterialrequisition', function (Blueprint $table) {
        $table->string('strMaterialRequisitionID')->primary();
        $table->string('strJobOrdID');
        $table->string('strEmployeeID');
        $table->date('dtNeeded');
        $table->foreign('strJobOrdID')
              ->references('strJobOrdID')->on('tbljoborder')
              ->onUpdate('cascade');
        $table->foreign('strEmployeeID')
              ->references( 'strEmployeeID')->on('tblemployee')
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
        Schema::dropIfExists('tblmaterialrequisition');
    }
}
