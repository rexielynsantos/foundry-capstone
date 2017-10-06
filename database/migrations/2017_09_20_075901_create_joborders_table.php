<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljoborder', function (Blueprint $table) {
        $table->string('strJobOrdID')->primary();
        $table->string('strCustPurchaseID');
        $table->boolean('boolIsNewProduct');
        $table->boolean('boolIsRepeatOrder');
        $table->text('strJobRemarks');
        $table->string('email');
        $table->timestamps();

        $table->foreign('strCustPurchaseID')
              ->references('strCustPurchaseID')->on('tblcustpurchase')
              ->onUpdate('cascade')
              ->onDelete('restrict');
            $table->foreign('email')
                  ->references('email')->on('users')
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
        Schema::dropIfExists('tbljoborder');
    }
}
