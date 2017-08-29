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
          'strPStatus' => 'Pending'
      ]);
      // DB::table('tblpurchase')->insert([
      //     'strPurchaseID' => 'P00002',
      //     'strSupplierID' => 'SUP00002',
      //     'strSupplierContactPerson' => 'Maria Gabriella Rola',
      //     'strPaymentTermID' => 'PT00003',
      //     'strStatus' => 'Received'
      // ]);
    }
}

