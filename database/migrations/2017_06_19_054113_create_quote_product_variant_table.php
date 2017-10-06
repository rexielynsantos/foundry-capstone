<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteProductVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblquoteproductvariant', function (Blueprint $table) {
        $table->string('strQuoteID');
        $table->string('strProductID');
        // $table->string('strProductVariantID');
        $table->string('strVarianceCode');
        $table->double('dblRequestCost');
        $table->integer('intOrderQty');
        $table->text('strRemarks');
        $table->text('strQuoteStatus');
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
        Schema::dropIfExists('tblquoteproductvariant');
    }
}
