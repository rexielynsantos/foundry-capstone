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
            'strSupplierID' => 'SUP00001',
            'dblMaterialCost' => 1000.50
        ]);
        DB::table('tblmaterialsupplier')->insert([
            'strMaterialID' => 'MAT00001',
            'strSupplierID' => 'SUP00002',
            'dblMaterialCost' => 500.50
        ]);
    }
}
