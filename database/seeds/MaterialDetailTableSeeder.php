<?php

use Illuminate\Database\Seeder;

class MaterialDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        DB::table('tblmaterialdetail')->insert([
            'strMaterialID' => 'MAT00001',
            'strMaterialVariantID' => 'MVAR00001'
        ]);
        DB::table('tblmaterialdetail')->insert([
            'strMaterialID' => 'MAT00002',
            'strMaterialVariantID' => 'MVAR00002'
        ]);
        DB::table('tblmaterialdetail')->insert([
            'strMaterialID' => 'MAT00003',
            'strMaterialVariantID' => 'MVAR00002'
        ]);
        DB::table('tblmaterialdetail')->insert([
            'strMaterialID' => 'MAT00004',
            'strMaterialVariantID' => 'MVAR00004'
        ]);
    }
}
