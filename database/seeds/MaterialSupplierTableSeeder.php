<?php

use Illuminate\Database\Seeder;

class MaterialSupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00001',
            'strSupplierID' => 'SUP00001'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00001',
            'strSupplierID' => 'SUP00002'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00001',
            'strSupplierID' => 'SUP00003'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00002',
            'strSupplierID' => 'SUP00002'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00003',
        	'strSupplierID' => 'SUP00002'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00003',
            'strSupplierID' => 'SUP00004'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00004',
            'strSupplierID' => 'SUP00002'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00004',
            'strSupplierID' => 'SUP00005'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00004',
            'strSupplierID' => 'SUP00001'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00005',
            'strSupplierID' => 'SUP00001'
        ]);
         DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00005',
            'strSupplierID' => 'SUP00002'
        ]);
         DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00005',
            'strSupplierID' => 'SUP00003'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00006',
            'strSupplierID' => 'SUP00003'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00006',
            'strSupplierID' => 'SUP00002'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00006',
            'strSupplierID' => 'SUP00004'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00007',
            'strSupplierID' => 'SUP00004'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00007',
            'strSupplierID' => 'SUP00003'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00007',
            'strSupplierID' => 'SUP00001'
        ]);
          DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00007',
            'strSupplierID' => 'SUP00002'
        ]);
           DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00008',
            'strSupplierID' => 'SUP00001'
        ]);
            DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00009',
            'strSupplierID' => 'SUP00002'
        ]);
            DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00010',
            'strSupplierID' => 'SUP00003'
        ]);
            DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00011',
            'strSupplierID' => 'SUP00004'
        ]);
            DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00009',
            'strSupplierID' => 'SUP00005'
        ]);
    }
}
