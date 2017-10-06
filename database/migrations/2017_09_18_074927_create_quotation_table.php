<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquotation', function (Blueprint $table) {
        $table->string('strQuoteID')->primary();
        $table->string('strCustomerID');
        $table->string('strTermID');
        $table->string('strCostingID');
        $table->text('strQuoteDescription')->nullable();
        $table->timestamps();
        $table->foreign('strCustomerID')
              ->references('strCustomerID')->on('tblcustomer')
              ->onUpdate('cascade');
        $table->foreign('strTermID')
              ->references('strTermID')->on('tbltermscondition')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strCostingID')
              ->references('strCostingID')->on('tblcosting')
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
        Schema::dropIfExists('tblquotation');
    }
}
