<?php

use Illuminate\Database\Seeder;

class ProductUOMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblproductuom')->insert([
          'strUOMID' => 'UOM00001',
          'strProductID' => 'PROD00001',
          'qty' => '5',
      ]);

      DB::table('tblproductuom')->insert([
          'strUOMID' => 'UOM00002',
          'strProductID' => 'PROD00001',
          'qty' => '10',
      ]);

      DB::table('tblproductuom')->insert([
          'strUOMID' => 'UOM00002',
          'strProductID' => 'PROD00002',
          'qty' => '10',
      ]);
    }
}
