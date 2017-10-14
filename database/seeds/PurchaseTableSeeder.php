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
          'strSupplierContactPerson' => 'Reese Lansangan',
          'strPaymentTermID' => 'PT00004',
          'dateCreated' => '2017-06-09',
          'strPStatus' => 'Pending',
          'isFinalize' => 1,
          'isDelivered' => 1,
           'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00002',
          'strSupplierID' => 'SUP00002',
          'strSupplierContactPerson' => 'Jensen Gomez',
          'strPaymentTermID' => 'PT00002',
          'dateCreated' => '2017-07-09',
          'strPStatus' => 'Pending',
          'isFinalize' => 1,
          'isDelivered' => 1,
           'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00003',
          'strSupplierID' => 'SUP00002',
          'strSupplierContactPerson' => 'Moira Dela Torre',
          'strPaymentTermID' => 'PT00002',
          'dateCreated' => '2017-08-09',
          'strPStatus' => 'Pending',
          'isFinalize' => 1,
          'isDelivered' => 1,
           'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblpurchase')->insert([
          'strPurchaseID' => 'P00004',
          'strSupplierID' => 'SUP00001',
          'strSupplierContactPerson' => 'Mark Carpio',
          'strPaymentTermID' => 'PT00004',
          'dateCreated' => '2017-09-09',
          'strPStatus' => 'Pending',
          'isFinalize' => 1,
          'isDelivered' => 1,
           'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}

