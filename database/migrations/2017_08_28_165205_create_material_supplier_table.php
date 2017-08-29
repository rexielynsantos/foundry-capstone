<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmaterialsupplier', function (Blueprint $table) {
         $table->string('strMaterialID');
         $table->string('strSupplierID');
         $table->foreign('strMaterialID')
               ->references('strMaterialID')->on('tblmaterial')
               ->onUpdate('cascade');
         $table->foreign('strSupplierID')
              ->references('strSupplierID')->on('tblsupplier')
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
        Schema::dropIfExists('tblmaterialsupplier');
    }
}
