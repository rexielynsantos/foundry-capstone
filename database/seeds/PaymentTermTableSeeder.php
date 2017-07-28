<?php

use Illuminate\Database\Seeder;

class PaymentTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblpaymentterm')->insert([
          'strPaymentTermID' => 'PT00001',
          'strPaymentTermName' => '30 days following the end of the month',
          'strPaymentTermDesc' => 'Payment should be done before reaching the 30th day after the month ends',
          'strStatus' => 'Active'
      ]);
      DB::table('tblpaymentterm')->insert([
          'strPaymentTermID' => 'PT00002',
          'strPaymentTermName' => '21 days',
          'strPaymentTermDesc' => 'Payment should be done before reaching the 21st day after today',
          'strStatus' => 'Active'
      ]);
      DB::table('tblpaymentterm')->insert([
          'strPaymentTermID' => 'PT00003',
          'strPaymentTermName' => 'Same day',
          'strPaymentTermDesc' => 'Payment should be done on the same day of order processing',
          'strStatus' => 'Active'
      ]);
      DB::table('tblpaymentterm')->insert([
          'strPaymentTermID' => 'PT00004',
          'strPaymentTermName' => 'On Delivery',
          'strPaymentTermDesc' => 'Payment should be done on the day it will be delivered',
          'strStatus' => 'Active'
      ]);
    }
}
