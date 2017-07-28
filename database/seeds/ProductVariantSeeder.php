<?php

use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblproductvariant')->insert([
          'strProductVariantID' => 'VAR00001',
          'intVariantQty' => '2',
          'strUOMID' => 'U00001',
          'strProductVariantDesc' => 'asdf',
          'strStatus' => 'Active',
      ]);
        DB::table('tblproductvariant')->insert([
          'strProductVariantID' => 'VAR00002',
          'intVariantQty' => '200',
          'strUOMID' => 'U00002',
          'strProductVariantDesc' => 'asdf',
          'strStatus' => 'Active',
      ]);
    }
}
