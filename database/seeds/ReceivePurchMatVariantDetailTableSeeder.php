<?php

use Illuminate\Database\Seeder;

class ReceivePurchMatVariantDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblreceivematvariantdetail')->insert([
          'strMaterialID' => 'MAT00001',
          'strMaterialVariantID' => 'MVAR00001',
          'intQtyReceived' => 50,
      ]);
        
    }
}
