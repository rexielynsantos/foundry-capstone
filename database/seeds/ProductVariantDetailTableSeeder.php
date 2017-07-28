<?php

use Illuminate\Database\Seeder;

class ProductVariantDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblvarianttype')->insert([
            'strProductTypeID' => 'TYPE00004',
            'strProductVariantID' => 'VAR00002',
        ]);
        DB::table('tblvarianttype')->insert([
            'strProductTypeID' => 'TYPE00005',
            'strProductVariantID' => 'VAR00002',
        ]);
        DB::table('tblvarianttype')->insert([
            'strProductTypeID' => 'TYPE00002',
            'strProductVariantID' => 'VAR00001',
        ]);
        DB::table('tblvarianttype')->insert([
            'strProductTypeID' => 'TYPE00003',
            'strProductVariantID' => 'VAR00001',
        ]);
    }
}
