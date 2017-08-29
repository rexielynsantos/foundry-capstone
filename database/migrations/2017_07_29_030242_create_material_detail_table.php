<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmaterialdetail', function (Blueprint $table) {
         $table->string('strMaterialID');
         $table->string('strMaterialVariantID');
         $table->foreign('strMaterialID')
               ->references('strMaterialID')->on('tblmaterial')
               ->onUpdate('cascade');
         $table->foreign('strMaterialVariantID')
              ->references('strMaterialVariantID')->on('tblmaterialvariant')
              ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblmaterialdetail');
    }
}
