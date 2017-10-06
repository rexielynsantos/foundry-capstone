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
          'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblproductvariant')->insert([
          'strProductVariantID' => 'VAR00002',
          'intVariantQty' => '200',
          'strUOMID' => 'U00002',
          'strProductVariantDesc' => 'asdf',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
    }
}
