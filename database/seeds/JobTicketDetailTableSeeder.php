<?php

use Illuminate\Database\Seeder;

class JobTicketDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbljobticketdetail')->insert([
          'strJobTicketID' => 'JT00001',
          'strProductID' => 'PROD00001',
 
  
      ]);
    }
}
