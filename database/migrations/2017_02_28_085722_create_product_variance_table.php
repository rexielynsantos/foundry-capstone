<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVarianceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproductvariance', function (Blueprint $table) {
          $table->string('strProductVarianceID')->unique();
          $table->string('strProductVarianceName')->unique();          
          $table->string('strProductVarianceDesc');
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
        Schema::dropIfExists('tblproductvariance');
    }
}
