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
          'strMaterialVariantID' => 'MVAR00001',
          'intVariantQty' => '100',
          'strUOMID' => 'U00003',
          'strMaterialVariantDesc' => 'asdf',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblmaterialvariant')->insert([
          'strMaterialVariantID' => 'MVAR00002',
          'intVariantQty' => '200',
          'strUOMID' => 'U00003',
          'strMaterialVariantDesc' => 'asdf',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
        DB::table('tblmaterialvariant')->insert([
          'strMaterialVariantID' => 'MVAR00003',
          'intVariantQty' => '300',
          'strUOMID' => 'U00003',
          'strMaterialVariantDesc' => 'asdf',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 03:00:00',
      ]);
        DB::table('tblmaterialvariant')->insert([
          'strMaterialVariantID' => 'MVAR00004',
          'intVariantQty' => '400',
          'strUOMID' => 'U00003',
          'strMaterialVariantDesc' => 'asdf',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
    }
}
