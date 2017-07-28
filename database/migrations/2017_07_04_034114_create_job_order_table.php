<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljoborder', function (Blueprint $table) {
        $table->string('strJobOrderID')->primary();
        $table->string('strQuoteRequestID');
        $table->string('strPaymentTermID');
        $table->date('dtOrderAccepted');
        $table->date('dtOrderDate');
        $table->date('dtOrderApproved');
        $table->date('dtOrderExpectedToBeDone');
        $table->date('dtExpectedDelivery');
        $table->date('dtFinished');
        $table->date('dtDelivered');
        $table->string('strStatus');
        $table->timestamps();
        $table->foreign('strQuoteRequestID')
                  ->references('strQuoteRequestID')->on('tblquoterequest');
        $table->foreign('strPaymentTermID')
                  ->references('strPaymentTermID')->on('tblpaymentterm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbljoborder');
    }
}
