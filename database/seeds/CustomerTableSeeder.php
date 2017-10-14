<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcustomer')->insert([
          'strCustomerID' => 'CUST00001',
          'strCompanyName' => 'Toyota Philippines',
          'strCustStreet' => '24-A',
    	    'strCustBrgy' => 'Maginhawa',
    	    'strCustCity' => 'Marikina',
    	    'strCustTelNo' => '956-09-12',
    	    'strCustEmail' => 'toyota@gmail.com',
    	    'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
         DB::table('tblcustomer')->insert([
          'strCustomerID' => 'CUST00002',
          'strCompanyName' => 'Arms Corporation',
          'strCustStreet' => '44',
          'strCustBrgy' => 'Fortune St. ',
          'strCustCity' => 'Marikina',
          'strCustTelNo' => '758-00-00',
          'strCustEmail' => 'armscor@gmail.com',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
