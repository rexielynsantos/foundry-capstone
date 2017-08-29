<?php

use Illuminate\Database\Seeder;

class MaterialSpecDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblmatspecdetail')->insert([
	      'strMatSpecID' => 'MS00001',
	      'strMaterialID' => 'MAT00001',
	      'dblMaterialQuantity' => 50,
	       ]);
	    DB::table('tblmatspecdetail')->insert([
	      'strMatSpecID' => 'MS00001',
	      'strMaterialID' => 'MAT00002',
	      'dblMaterialQuantity' => 50,

	    ]);
    }
}
