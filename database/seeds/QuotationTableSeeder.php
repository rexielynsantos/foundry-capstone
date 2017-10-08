<?php

use Illuminate\Database\Seeder;

class QuotationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblquotation')->insert([
          'strQuoteID' => 'QR-00001',
          'strCustomerID' => 'CUST00001',
          'strTermID' => 'TERM00001',
    	    'strCostingID' => 'PC00001',
          'strQuoteDescription' => 'description',
    	    'strQuoteStatus' => 'Approved',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
