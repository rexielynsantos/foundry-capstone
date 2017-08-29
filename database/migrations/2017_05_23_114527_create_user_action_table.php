<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbluseraction', function (Blueprint $table) {
        $table->string('strUserActionID')->primary();
        $table->string('strUserActionName')->unique();
        $table->text('strUserActionDesc')->nullable();
        $table->string('strModuleID');
        $table->string('strStatus');
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
        Schema::dropIfExists('tbluseraction');
    }
}

