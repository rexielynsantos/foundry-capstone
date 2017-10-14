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
          'strPOID' => 'PO-00001',
          'dtOrderDate' => '2017-08-09',
          'dtDeliveryDate' => '2017-08-09',
    	    'strCustomerID' => 'CUST00001',
    	    'strQuoteID' => 'QR-00001',
          'strSOStatus' => 'Job On-Process',
          'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblcustpurchase')->insert([
          'strCustPurchaseID' => 'SO-00002',
          'strPOID' => 'PO-00002',
          'dtOrderDate' => '2017-08-11',
          'dtDeliveryDate' => '2017-08-20',
          'strCustomerID' => 'CUST00001',
          'strQuoteID' => 'QR-00001',
          'strSOStatus' => 'On-Process',
          'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblcustpurchase')->insert([
          'strCustPurchaseID' => 'SO-00003',
          'strPOID' => 'PO-00909',
          'dtOrderDate' => '2017-08-11',
          'dtDeliveryDate' => '2017-08-20',
          'strCustomerID' => 'CUST00002',
          'strQuoteID' => 'QR-00001',
          'strSOStatus' => 'On-Process',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
