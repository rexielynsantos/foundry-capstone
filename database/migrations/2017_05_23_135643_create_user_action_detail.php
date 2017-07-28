<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActionDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbluseractiondetail', function (Blueprint $table) {
        $table->string('strUserActionID');
        $table->string('strEmployeeID');
        $table->boolean('boolIsActive');
        $table->foreign('strUserActionID')
              ->references('strUserActionID')->on('tbluseraction')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strEmployeeID')
              ->references('strEmployeeID')->on('tblemployee')
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
        Schema::dropIfExists('tbluseractiondetail');
    }
}
