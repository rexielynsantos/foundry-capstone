<?php

use Illuminate\Database\Seeder;

class ReceivePurchaseDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tblreceivepurchasedetail')->insert([
          'strReceivePurchaseID' => 'REC00001',
          'strMaterialID' => 'MAT00001',
          'intQtyReceived' => 50,
          'intQtyLeft' => 10,
          'strUOMID' => 'U00001',
      ]);
       DB::table('tblreceivepurchasedetail')->insert([
          'strReceivePurchaseID' => 'REC00001',
          'strMaterialID' => 'MAT00002',
          'intQtyReceived' => 100,
          'intQtyLeft' => 10,
          'strUOMID' => 'U00001',
      ]);
    }
}
