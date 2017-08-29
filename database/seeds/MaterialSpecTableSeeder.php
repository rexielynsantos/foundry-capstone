<?php

use Illuminate\Database\Seeder;

class MaterialSpecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('tblmatspec')->insert([
	      'strMatSpecID' => 'MS00001',
        'strVarianceCode' => "SCH15",
	      'strProductID' => 'PROD00001',
	      'strStatus'  => 'Active',
	    ]);
	    DB::table('tblmatspec')->insert([
	      'strMatSpecID' => 'MS00002',
        'strVarianceCode' => "SCH17",
	      'strProductID' => 'PROD00002',
	      'strStatus'  => 'Active',
	    ]);
    }
}
