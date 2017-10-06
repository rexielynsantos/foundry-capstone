<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00001',
          'strMaterialName' => 'Zircon Sand', 
          'intReorderLevel' => 24, 
          'intReorderQty' => 100, 
          'strUOMID' => 'U00002', 
          'dblBasePrice' => '1000.00', 
          'strMaterialDesc' => 'investment casting special zircon sand',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00002',
          'strMaterialName' => 'Allied Minerals', 
          'intReorderLevel' => 50, 
          'intReorderQty' => 200, 
          'strUOMID' => 'U00003', 
          'dblBasePrice' => '1000.00', 
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00003',
          'strMaterialName' => 'Silica Sand', 
          'intReorderLevel' => 50, 
          'intReorderQty' => 200, 
          'strUOMID' => 'U00002', 
          'dblBasePrice' => '1000.00', 
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 03:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00004',
          'strMaterialName' => 'Resin Coated Sand', 
          'intReorderLevel' => 50, 
          'intReorderQty' => 200, 
          'strUOMID' => 'U00003', 
          'dblBasePrice' => '1000.00', 
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00005',
          'strMaterialName' => 'Ferro Alloys', 
          'intReorderLevel' => 50, 
          'intReorderQty' => 200, 
          'strUOMID' => 'U00003', 
          'dblBasePrice' => '1000.00', 
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 05:00:00',
      ]);

    }
}
