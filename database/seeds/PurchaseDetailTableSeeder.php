<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class PurchaseDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00001',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00001',
          'strMaterialID' => 'MAT00002',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00002',
          'strMaterialID' => 'MAT00002',
           'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00002',
          'strMaterialID' => 'MAT00003',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00002',
          'strMaterialID' => 'MAT00004',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00003',
          'strMaterialID' => 'MAT00002',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00003',
          'strMaterialID' => 'MAT00001',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00004',
          'strMaterialID' => 'MAT00001',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00004',
          'strMaterialID' => 'MAT00002',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      DB::table('tblpurchasedetail')->insert([
          'strPurchaseID' => 'P00004',
          'strMaterialID' => 'MAT00004',
            'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
      ]);
      
      // DB::table('tblpurchasedetail')->insert([
      //     'strPurchaseID' => 'P00001',
      //     'strMaterialID' => 'MAT00003',
      // ]);
     
    }
}
