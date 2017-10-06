<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblstage', function (Blueprint $table) {
        $table->string('strStageID')->primary();
        $table->string('strStageName')->unique();
        $table->double('dbltimeRequired')->nullable();
        $table->text('strStageDesc')->nullable();
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
        Schema::dropIfExists('tblstage');
    }
}
