<?php

use Illuminate\Database\Seeder;

class QuoteProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblquoterequestproduct')->insert([
          'strQuoteRequestID' => 'QR00001',
          'strProductID' => 'PROD00001',
          'strRemarks' => 'DETAILS'
      ]);
    }
}
