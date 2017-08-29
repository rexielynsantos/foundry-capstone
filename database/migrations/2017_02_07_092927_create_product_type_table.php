<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblproducttype', function (Blueprint $table) {
        $table->string('strProductTypeID')->primary();
        $table->string('strProductTypeName')->unique();
        $table->text('strProductTypeDesc')->nullable();
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
      Schema::dropIfExists('tblproducttype');
    }
}
