<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblmaterial', function (Blueprint $table) {
        $table->string('strMaterialID')->primary();
        $table->string('strMaterialName');
        $table->string('strMaterialVariantID');
        $table->integer('intQtyOnHand')->default(0);
        $table->integer('intReorderLevel');
        $table->integer('intReorderQty');
        $table->string('strUOMID');
        $table->double('dblBasePrice');
        $table->text('strMaterialDesc')->nullable();
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
        Schema::dropIFExists('tblmaterial');
    }
}
