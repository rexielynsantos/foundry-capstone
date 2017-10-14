<?php

use Illuminate\Database\Seeder;

class CostingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcosting')->insert([
          'strCostingID' => 'PC00001',
          'strCustomerID' => 'CUST00001',
          'strProductID' => 'PROD00001',
          'strMatSpecID' => 'MS00001',
    	  'dblSpecificGravity' => 7.83,

    	  'dblSurfaceArea' => 14.364,
    	  'dblMainVolume' => 1.594,
    	  'dblWeightNonFilled' => 1.435,
    	  'dblWeightFilled' => 0.01,
    	  'dblWeightSoluble' => 0.01,
    	  'dblWeightReclaimed' => 0.01,
    	  'dblWeightAsMetal' => 12.482,

    	  'dblRunnerType' => 3.0,
    	  'dblArea' => 333.0,
    	  'dblSideVolume' => 243.00,
    	  'dblWeight' => 226.464,

    	  'dblSprueType' => 305.512,
    	  'dblClusterArea' => 1.011,

    	  'dblClusterWeightAsWax' => 303.420,
    	  'dblClusterWeightAsMetal' => 2.639,

    	  'intPcsPerCluster' => 26,

    	  'dblEfficiencyAtInjection' => 98.00,
    	  'dblEfficiencyAtAssembly' => 100.00,
    	  'dblEfficiencyAtCoating' => 100.00,
    	  'dblEfficiencyAtCasting' => 98.00,

    	  'strCostingStatus' => 'For Approval',
        'created_at' => '2000-01-01 01:00:00',

      ]);
    }
}
