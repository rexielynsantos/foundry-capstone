<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatspecDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmatspecdetail', function (Blueprint $table) {
        $table->string('strMatSpecID');
        $table->string('strMaterialID');
        $table->double('dblMaterialQuantity');

        $table->foreign('strMatSpecID')
                 ->references('strMatSpecID')->on('tblmatspec')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('tblmatspecdetail');
    }
}
