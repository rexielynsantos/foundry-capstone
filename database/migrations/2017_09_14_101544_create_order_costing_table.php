<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCostingTable extends Migration
{
    /**
ble     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcosting', function (Blueprint $table) {
        $table->string('strCostingID')->primary();
        $table->string('strCustomerID');
        $table->string('strProductID');
        $table->double('dblSpecificGravity');

        $table->double('dblSurfaceArea');
        $table->double('dblMainVolume');
        $table->double('dblWeightNonFilled')->nullable();
        $table->double('dblWeightFilled')->nullable();
        $table->double('dblWeightSoluble')->nullable();
        $table->double('dblWeightReclaimed')->nullable();
        $table->double('dblWeightAsMetal');

        $table->double('dblRunnerType');
        $table->double('dblArea');
        $table->double('dblSideVolume');
        $table->double('dblWeight');

        $table->double('dblSprueType');
        $table->double('dblClusterArea');

        $table->double('dblClusterWeightAsWax');
        $table->double('dblClusterWeightAsMetal');

        $table->integer('intPcsPerCluster');

        $table->double('dblEfficiencyAtInjection');
        $table->double('dblEfficiencyAtAssembly');
        $table->double('dblEfficiencyAtCoating');
        $table->double('dblEfficiencyAtCasting');
        $table->string('strCostingStatus');
        $table->timestamps();
        $table->foreign('strCustomerID')
              ->references('strCustomerID')->on('tblcustomer')
              ->onUpdate('cascade')
              ->onDelete('restrict');
        $table->foreign('strProductID')
              ->references('strProductID')->on('tblproduct')
              ->onUpdate('cascade')
              ->onDelete('restrict');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcosting');
    }
}
