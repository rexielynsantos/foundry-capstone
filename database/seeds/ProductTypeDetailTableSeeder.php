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
        //investment casting
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00001',
            'strProductTypeID' => 'TYPE00001',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00001',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00003',
            'strProductTypeID' => 'TYPE00001',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00004',
            'strProductTypeID' => 'TYPE00001',
        ]);
        

        //metal injection

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00005',
            'strProductTypeID' => 'TYPE00002',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00006',
            'strProductTypeID' => 'TYPE00002',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00007',
            'strProductTypeID' => 'TYPE00002',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00012',
            'strProductTypeID' => 'TYPE00002',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00008',
            'strProductTypeID' => 'TYPE00002',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00009',
            'strProductTypeID' => 'TYPE00002',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00011',
            'strProductTypeID' => 'TYPE00002',
        ]);

        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00010',
            'strProductTypeID' => 'TYPE00002',
        ]);


        //plastic injection

         DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00001',
            'strProductTypeID' => 'TYPE00003',
        ]);
          DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00002',
            'strProductTypeID' => 'TYPE00003',
        ]);
           DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00003',
            'strProductTypeID' => 'TYPE00003',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00005',
            'strProductTypeID' => 'TYPE00003',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00012',
            'strProductTypeID' => 'TYPE00003',
        ]);
        DB::table('tblproducttypedetail')->insert([
            'strStageID' => 'ST00013',
            'strProductTypeID' => 'TYPE00003',
        ]);
    }
}
