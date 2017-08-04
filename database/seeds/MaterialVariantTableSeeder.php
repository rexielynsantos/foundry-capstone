<?php

use Illuminate\Database\Seeder;

class MaterialVariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblmaterialvariant')->insert([
          'strMaterialVariantID' => 'MVAR00002',
          'intVariantQty' => '200',
          'strUOMID' => 'U00002',
          'strMaterialVariantDesc' => 'asdf',
          'strStatus' => 'Active',
      ]);
    }
}
