<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustContactpersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcustcontact', function (Blueprint $table) {
        $table->string('strCustomerID');
        $table->string('strContactPersonName');
        $table->string('strContactNo');
        $table->foreign('strCustomerID')
              ->references('strCustomerID')->on('tblcustomer')
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
        Schema::dropIfExists('tblcustcontact');
    }
}
