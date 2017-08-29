<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobtitle', function (Blueprint $table) {
        $table->string('strJobTitleID')->primary();
        $table->string('strJobTitleName')->unique();
        $table->text('strJobTitleDesc')->nullable();
        $table->string('strStatus');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbljobtitle');
    }
}
