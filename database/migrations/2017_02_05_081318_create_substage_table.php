<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubstageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblsubstage', function (Blueprint $table) {
        $table->string('strSubStageID')->primary();
        $table->string('strSubStageName')->unique();
        $table->double('dbltimeRequired', 2);
        $table->text('strSubStageDesc')->nullable();
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
        Schema::dropIfExists('tblsubstage');
    }
}
