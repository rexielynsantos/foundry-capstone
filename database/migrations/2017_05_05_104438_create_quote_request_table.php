<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquoterequest', function (Blueprint $table) {
        $table->string('strQuoteRequestID')->primary();
        $table->string('strCompanyName');
        $table->string('strCustStreet');
        $table->string('strCustBrgy');
        $table->string('strCustCity');
        $table->string('strCustContactPerson');
        $table->string('strCustEmail');
        $table->string('strCustContactNo');
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
        Schema::dropIfExists('tblquoterequest');
    }
}
