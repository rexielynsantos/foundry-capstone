<?php

use Illuminate\Database\Seeder;

class ProductTypeDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00001',
            'strProductTypeID' => 'TYPE00001',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00002',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00003',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00004',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00005',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00006',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00007',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00001',
            'strProductTypeID' => 'TYPE00007',
        ]);
    }
}
