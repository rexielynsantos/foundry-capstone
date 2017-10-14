<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobticketDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobticketdetail', function (Blueprint $table) {
        $table->string('strJobTicketID');
        $table->string('strProductID');
        // $table->string('strCastingID'); //generated to per product
        $table->double('dblJobFinished')->nullable();
        $table->time('timeStarted');
        $table->time('timeFinished')->nullable(); 
        $table->timestamps();
        $table->foreign('strJobTicketID')
                  ->references('strJobTicketID')->on('tbljobticket');
        $table->foreign('strProductID')
                  ->references('strProductID')->on('tblproduct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbljobticketdetail');
    }
}
