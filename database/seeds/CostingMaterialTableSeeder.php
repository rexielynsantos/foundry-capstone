<?php

use Illuminate\Database\Seeder;

class CostingMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcostingmaterial')->insert([
          'strCostingID' => 'PC00001',
          'strMaterialID' => 'MAT00001',
          'strUOMID' => 'U00002',
		      'dblMatCost' => 100.00,
		      'dblUsage' => 0.0034,
	      'dblFinalCost' => 1,
      ]);
    }
}
