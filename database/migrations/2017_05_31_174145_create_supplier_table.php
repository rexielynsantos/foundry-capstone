<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblsupplier', function (Blueprint $table) {
        $table->string('strSupplierID')->primary();
        $table->string('strSupplierName')->unique();
        $table->string('strSupStreet');
        $table->string('strSupBrgy');
        $table->string('strSupCity');
        $table->text('strSupplierDesc')->nullable();
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
        Schema::dropIfExists('tblsupplier');
    }
}
