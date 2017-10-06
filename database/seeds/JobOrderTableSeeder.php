<?php

use Illuminate\Database\Seeder;

class JobOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbljoborder')->insert([
          'strJobOrdID' => 'JO-00001',
          'strCustPurchaseID' => 'SO-00001',
          'boolIsNewProduct' => 1,
    	    'boolIsRepeatOrder' => 0,
    	    'strJobRemarks' => 'description',
    	    'email' => 'rexielynsantos@gmail.com',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
