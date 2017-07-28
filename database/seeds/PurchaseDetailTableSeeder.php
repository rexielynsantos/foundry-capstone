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
          'dblReorderQty' => 100,
          'dblAddlQty' =>50,
          'strUOMID' => 'U00001',

      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00002',
          'dblReorderQty' => 200,
          'dblAddlQty' =>100,
          'strUOMID' => 'U00001',
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00002',
          'strMaterialID' => 'MAT00003',
          'dblReorderQty' => 200,
          'dblAddlQty' =>100,
          'strUOMID' => 'U00001',
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00003',
          'strMaterialID' => 'MAT00004',
          'dblReorderQty' => 200,
          'dblAddlQty' =>100,
          'strUOMID' => 'U00001',
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00003',
          'strMaterialID' => 'MAT00003',
          'dblReorderQty' => 200,
          'dblAddlQty' =>100,
          'strUOMID' => 'U00001',
      ]);
    }
}
