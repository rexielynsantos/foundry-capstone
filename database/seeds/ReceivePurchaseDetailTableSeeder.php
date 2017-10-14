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
          'quantityReceived' => 50,
          'qtyReturned' => 0,
          'isActive' => 1,
          'created_at' => '2017-08-10 01:00:00',

          
      ]);
    }
}
