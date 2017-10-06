<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstagedetail', function (Blueprint $table) {
        $table->string('strStageID');
        $table->string('strSubStageID');
        $table->foreign('strStageID')
              ->references('strStageID')->on('tblstage')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strSubStageID')
              ->references('strSubStageID')->on('tblsubstage')
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
        Schema::dropIfExists('tblstagedetail');
    }
}
