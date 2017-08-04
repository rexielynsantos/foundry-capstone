<?php

use Illuminate\Database\Seeder;

class PurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00001',
          'strSupplierID' => 'SUP00001',
          'strPaymentTermID' => 'PT00002',
          'strPaymentTermID' => 'PT00001',
          'strStatus' => 'Pending'
      ]);
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00002',
          'strSupplierID' => 'SUP00002',
          'strPaymentTermID' => 'PT00003',
          'strStatus' => 'Received'
      ]);
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00003',
          'strSupplierID' => 'SUP00001',
          'strPaymentTermID' => 'PT00004',
          'strStatus' => 'Delivered'
      ]);

    }
}

