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
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 350,
          'intReorderLevel' => 24,
          'intReorderQty' => 100,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'investment casting special zircon sand',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00002',
          'strMaterialName' => 'Allied Minerals',
           'strMaterialVariantID' => 'MVAR00002',
           'intQtyOnHand' => 450,
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
           'strMaterialVariantID' => 'MVAR00003',
           'intQtyOnHand' => 250,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 03:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00004',
          'strMaterialName' => 'Resin Coated Sand',
          'strMaterialVariantID' => 'MVAR00004',
          'intQtyOnHand' => 300,
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
          'strMaterialName' => 'Investment Powder',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'metal casting minerals',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00006',
          'strMaterialName' => 'Pandora Alloy',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'Yellow Green',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00007',
          'strMaterialName' => 'Pandora Alloy',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'Yellow Green',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]); 
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00008',
          'strMaterialName' => 'MIM F-15',
          'strMaterialVariantID' => 'MVAR00002',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'also known as Kovar, is a low expansion alloy used for glass-to metal sealing.',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]); 
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00009',
          'strMaterialName' => 'MIM F-15',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'also known as Kovar, is a low expansion alloy used for glass-to metal sealing.',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]); 
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00010',
          'strMaterialName' => 'MIM-Fe50%Ni',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'also known as Kovar, is a low expansion alloy used for glass-to metal sealing.',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]); 
      DB::table('tblmaterial')->insert([
          'strMaterialID' => 'MAT00011',
          'strMaterialName' => 'MIM-17-4 PH',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyOnHand' => 300,
          'intReorderLevel' => 50,
          'intReorderQty' => 200,
          'strUOMID' => 'U00003',
          'dblBasePrice' => '1000.00',
          'strMaterialDesc' => 'offers a good balance between corrosion resistance and strength. It is magnetic and hardenable to various strength levels by varying the aging heat-treating temperature',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]); 


    }
}
