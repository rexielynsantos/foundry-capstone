<?php

use Illuminate\Database\Seeder;

class ReceivePurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tblreceivepurchase')->insert([
          'strReceivePurchaseID' => 'REC00001',
          'strPurchaseID' => 'P00001',
          'dtDeliveryReceived' => '2017-08-09',
          'created_at' => '2000-01-01 01:00:00',
      ]);

    }
}
