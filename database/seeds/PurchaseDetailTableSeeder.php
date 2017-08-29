<?php

use Illuminate\Database\Seeder;

class PurchaseDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00001',
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00002',
      ]);
      // DB::table('tblpurchasedetail')->insert([
      //     'strPurchaseID' => 'P00001',
      //     'strMaterialID' => 'MAT00003',
      // ]);
     
    }
}
