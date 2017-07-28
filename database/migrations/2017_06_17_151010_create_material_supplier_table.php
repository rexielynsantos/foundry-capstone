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
        Schema::create('tblmaterialsupplier', function (Blueprint $table)
        {   
            $table ->string('strSupplierID');
            $table ->string('strMaterialID');
            // $table ->double('dblMaterialCost');
            $table->foreign('strSupplierID')
                  ->references('strSupplierID')->on('tblsupplier')
                  ->onUpdate('cascade');
                  // ->onDelete('restrict');
            $table->foreign('strMaterialID')
                  ->references('strMaterialID')->on('tblmaterial')
                  ->onUpdate('cascade');
                  // ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIFExists('tblmaterialsupplier');
    }
}
