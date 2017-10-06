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
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblproductvariance')->insert([
          'strProductVarianceID' => 'PV00002',
          'strProductVarianceQty' => '7',
          'strUOMID' => 'UOM00002',
          'strProductVarianceDesc' => 'for ammunition',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
    }
}
