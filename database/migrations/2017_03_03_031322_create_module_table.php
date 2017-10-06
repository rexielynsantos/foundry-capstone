<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblmodule', function (Blueprint $table) {
        $table->string('strModuleID')->primary();
        $table->string('strModuleName')->unique();
        $table->text('strModuleDesc')->nullable();
        $table->string('strDepartmentID');
        $table->string('strStatus');
        $table->timestamps();
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
        Schema::dropIfExists('tblmodule');
    }
}
