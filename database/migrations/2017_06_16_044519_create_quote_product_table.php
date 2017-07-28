<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteProductTable extends Migration
{
    /**
     * Run the migrations.
     *  
     * @return void
     */
    public function up()
    {
        Schema::create('tblquoterequestproduct', function (Blueprint $table) {
        $table->string('strQuoteRequestID');
        $table->string('strProductID');
        $table->text('strRemarks');
        $table->foreign('strQuoteRequestID')
                  ->references('strQuoteRequestID')->on('tblquoterequest')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        $table->foreign('strProductID')
                  ->references('strProductID')->on('tblproduct')
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
        Schema::dropIfExists('tblquoterequestproduct');
    }
}
