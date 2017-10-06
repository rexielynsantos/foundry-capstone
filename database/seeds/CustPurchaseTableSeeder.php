<?php

use Illuminate\Database\Seeder;

class CustPurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcustpurchase')->insert([
          'strCustPurchaseID' => 'SO-00001',
          'dtOrderDate' => '2017-08-09',
          'dtDeliveryDate' => '2017-08-09',
    	    'strCustomerID' => 'CUST00001',
    	    'strQuoteID' => 'QR-00001',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
