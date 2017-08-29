<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobstage', function (Blueprint $table) {
        $table->string('strStageID');
        $table->string('strJobOrderID');
        $table->boolean('boolIsDone');
        $table->foreign('strStageID')
              ->references('strStageID')->on('tblstage')
              ->onUpdate('cascade');
        $table->foreign('strJobOrderID')
              ->references( 'strJobOrderID')->on('tblquotejoborder')
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
        Schema::dropIfExists('tbljobstage');
    }
}
