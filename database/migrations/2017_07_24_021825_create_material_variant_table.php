<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmaterialvariant', function (Blueprint $table) {
        $table->string('strMaterialVariantID')->primary();
        $table->integer('intVariantQty');
        $table->string('strUOMID');
        $table->text('strMaterialVariantDesc')->nullable();
        $table->string('strStatus');
        $table->timestamps();
        $table->foreign('strUOMID')
              ->references('strUOMID')->on('tbluom')
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
        Schema::dropIfExists('tblmaterialvariant');
    }
}
