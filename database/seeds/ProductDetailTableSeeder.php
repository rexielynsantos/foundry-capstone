<?php

use Illuminate\Database\Seeder;

class ProductDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00001',
            'strProductID' => 'PROD00001',
        ]);
        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00002',
            'strProductID' => 'PROD00002',
        ]);

        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00001',
            'strProductID' => 'PROD00003',
        ]);
        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00002',
            'strProductID' => 'PROD00003',
        ]);
        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00002',
            'strProductID' => 'PROD00004',
        ]);
        DB::table('tblproductdetail')->insert([
            'strProductVariantID' => 'VAR00001',
            'strProductID' => 'PROD00004',
        ]);
    }
}
