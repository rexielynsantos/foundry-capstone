<?php

use Illuminate\Database\Seeder;

class PurchMatVariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblpurchmatvariantdetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00001',
          'strMaterialVariantID' => 'MVAR00001',
          'dblAddlQty' => 100,
          'totalQty' => 250,
          'dblMaterialCost' => 1000.34,

        ]);
        DB::table('tblpurchmatvariantdetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00002',
          'strMaterialVariantID' => 'MVAR00002',
          'dblAddlQty' => 100,
          'totalQty' => 250,
          'dblMaterialCost' => 1000.34,

        ]);

    }
}
