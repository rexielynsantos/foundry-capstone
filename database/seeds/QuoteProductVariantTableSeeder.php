<?php

use Illuminate\Database\Seeder;

class QuoteProductVariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblquoteproductvariant')->insert([
          'strQuoteID' => 'QR-00001',
          'strProductID' => 'PROD00001',
          'strVarianceCode' => 'SCH15',
    	  'dblRequestCost' => '5000',
          'intOrderQty' => '100',
    	  'strRemarks' => 'Remarks',
          'strQuoteStatus' => 'Approved',
      ]);
    }
}
