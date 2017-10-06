<?php

use Illuminate\Database\Seeder;

class CustomerContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblcustcontact')->insert([
          'strCustomerID' => 'CUST00001',
          'strContactPersonName' => 'Mr. Angelo Torres',
          'strContactNo' => '+639071295541',
      ]);
    }
}
