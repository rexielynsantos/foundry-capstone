<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbldepartment', function (Blueprint $table) {
        $table->string('strDepartmentID')->primary();
        $table->string('strDepartmentName')->unique();
        $table->text('strDepartmentDesc')->nullable();
        $table->string('strStatus');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbldepartment');
    }
}
