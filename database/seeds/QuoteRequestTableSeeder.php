<?php

use Illuminate\Database\Seeder;

class QuoteRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblquoterequest')->insert([
          'strQuoteRequestID' => 'QR00001',
          'strCompanyName' => 'Toyota Philippines',
          'strCustStreet' => '23-A',
          'strCustBrgy' => 'Mabuhay',
          'strCustCity' => 'Pasig',
          'strCustContactPerson' => 'Ronald Santos',
          'strCustEmail' => 'ronaldsantos@gmail.com',
          'strCustContactNo' => '09345678756',
          'strStatus' => 'Approved',
      ]);
        DB::table('tblquoterequest')->insert([
          'strQuoteRequestID' => 'QR00002',
          'strCompanyName' => 'Honda Philippines',
          'strCustStreet' => '15D',
          'strCustBrgy' => 'Meycauayan',
          'strCustCity' => 'Bulacan',
          'strCustContactPerson' => 'Ken Llana',
          'strCustEmail' => 'kenllana@gmail.com',
          'strCustContactNo' => '09343435353',
          'strStatus' => 'Approved',
      ]);
    }
}
