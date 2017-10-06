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
	      'created_at' => '2000-01-01 01:00:00',
	    ]);
	    DB::table('tblmatspec')->insert([
	      'strMatSpecID' => 'MS00002',
        'strVarianceCode' => "SCH17",
	      'strProductID' => 'PROD00002',
	      'strStatus'  => 'Active',
	      'created_at' => '2000-01-01 02:00:00',
	    ]);
    }
}
