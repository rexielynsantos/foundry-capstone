<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblemployee', function (Blueprint $table) {
        $table->string('strEmployeeID')->primary();
        $table->string('strEmployeeLast');
        $table->string('strEmployeeFirst');
        $table->string('strEmployeeMiddle');
        $table->string('strEmployeeEmail');
        $table->string('strEmployeeContact');
        $table->string('strJobTitleID');
        $table->string('strDepartmentID');
        $table->string('strEmployeeImagePath')->nullable();
        $table->string('strTempImage')->nullable();
        $table->string('strStatus');
        $table->timestamps();
        $table->foreign('strJobTitleID')
              ->references('strJobTitleID')->on('tbljobtitle')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strDepartmentID')
              ->references('strDepartmentID')->on('tbldepartment')
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
        Schema::dropIfExists('tblemployee');

    }
}
