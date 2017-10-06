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
          'strSupplierContactPerson' => 'Kevin Salud',
          'strPaymentTermID' => 'PT00004',
          'dateCreated' => '2017-06-23',
          'strPStatus' => 'Pending',
          'isFinalize' => 1,
          'isDelivered' => 1,
           'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}

