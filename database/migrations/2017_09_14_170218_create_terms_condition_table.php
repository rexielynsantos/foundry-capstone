<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltermscondition', function (Blueprint $table) {
        $table->string('strTermID')->primary();
        $table->string('strModuleID');
        $table->text('strNote');
        $table->string('strStatus');
        $table->timestamps();
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
        Schema::dropIfExists('tbltermscondition');
    }
}
