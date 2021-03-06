<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUOMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbluom', function (Blueprint $table) {
        $table->string('strUOMID')->primary();
        $table->string('strUOMName')->unique();
        $table->text('strUOMDesc')->nullable();
        // $table->string('strUOMTypeID');
        $table->string('strStatus');
        $table->timestamps();

        // $table->foreign('strUOMTypeID')
        //       ->references('strUOMTypeID')->on('tbluomtype')
        //       ->onUpdate('cascade')
        //       ->onDelete('restrict');
      });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbluom');
    }
}
