<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblworkflow', function (Blueprint $table) {
        $table->string('strWorkflowID')->primary();
        $table->string('strWorkflowName');
        $table->string('strModuleID');
        $table->boolean('boolDraftIsChecked');
        $table->boolean('boolForReviewIsChecked');
        $table->boolean('boolForRevisionIsChecked');
        $table->boolean('boolRevisedIsChecked');
        $table->boolean('boolApprovedIsChecked');
        $table->boolean('boolExpiredIsChecked');
        $table->foreign('strModuleID')
              ->references('strModuleID')->on('tblmodule')
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
        Schema::dropIfExists('tblworkflow');
    }
}
