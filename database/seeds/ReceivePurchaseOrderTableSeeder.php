<?php

use Illuminate\Database\Seeder;

class ReceivePurchaseOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblreceivepurchaseorder')->insert([
          'strReceivePurchaseID' => 'REC00001',
          'strPurchaseID' => 'P00001',          
      ]);
    }
}
