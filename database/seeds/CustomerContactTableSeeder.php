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
        DB::table('tblcustcontact')->insert([
          'strCustomerID' => 'CUST00002',
          'strContactPersonName' => 'Ms. Reese Lansangan',
          'strContactNo' => '+639451295641',
       ]);
        DB::table('tblcustcontact')->insert([
          'strCustomerID' => 'CUST00002',
          'strContactPersonName' => 'Ms. Kai Honnasan',
          'strContactNo' => '+639231295651',
       ]);
    }
}
