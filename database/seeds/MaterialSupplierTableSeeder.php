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
            'strMaterialID' => 'MAT00002',
            'strSupplierID' => 'SUP00002'
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00003',
        	'strSupplierID' => 'SUP00002'
        ]);
    }
}
