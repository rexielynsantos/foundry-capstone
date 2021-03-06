<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcustomer', function (Blueprint $table) {
        $table->string('strCustomerID')->primary();
        $table->string('strCompanyName')->unique();
        $table->string('strCustStreet');
        $table->string('strCustBrgy');
        $table->string('strCustCity');
        $table->string('strCustTelNo')->unique();
        $table->string('strCustEmail')->unique();
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
        Schema::dropIfExists('tblcustomer');
    }
}
