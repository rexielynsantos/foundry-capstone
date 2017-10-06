<?php

use Illuminate\Database\Seeder;

class CustContactTableSeeder extends Seeder
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
          'strContactPersonName' => 'Charlene Santos',
          'strContactNo' => '09263217470',
      ]);
    }
}
