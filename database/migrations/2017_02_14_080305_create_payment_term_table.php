<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblpaymentterm', function (Blueprint $table) {
        $table->string('strPaymentTermID')->primary();
        $table->string('strPaymentTermName')->unique();
        $table->text('strPaymentTermDesc')->nullable();
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
        Schema::dropIfExists('tblpaymentterm');
    }
}
