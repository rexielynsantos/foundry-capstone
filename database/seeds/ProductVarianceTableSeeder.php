<?php

use Illuminate\Database\Seeder;

class ProductVarianceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblproductvariance')->insert([
          'strProductVarianceID' => 'PV00001',
          'strProductVarianceQty' => '55',
          'strUOMID' => 'UOM00001',
          'strProductVarianceDesc' => 'for bullets',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproductvariance')->insert([
          'strProductVarianceID' => 'PV00002',
          'strProductVarianceQty' => '7',
          'strUOMID' => 'UOM00002',
          'strProductVarianceDesc' => 'for ammunition',
          'strStatus' => 'Active'
      ]);
    }
}
