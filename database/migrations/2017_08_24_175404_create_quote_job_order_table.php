<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteJobOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquotejoborder', function (Blueprint $table) {
        $table->string('strJobOrderID')->primary();
        $table->string('strQuoteRequestID');
        $table->string('strProductID');
        $table->foreign('strQuoteRequestID')
              ->references('strQuoteRequestID')->on('tblquoterequest')
              ->onUpdate('cascade');
        $table->foreign('strProductID')
              ->references('strProductID')->on('tblquoteproductvariant')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblquotejoborder');
    }
}
