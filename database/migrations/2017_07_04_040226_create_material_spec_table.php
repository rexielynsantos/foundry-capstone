<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmatspec', function (Blueprint $table) {
        $table->string('strMatSpecID')->primary();
        $table->string('strProductID');
        $table->foreign('strProductID')
                  ->references('strProductID')->on('tblproduct');
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
        Schema::dropIfExists('tblmatspec');
    }
}
