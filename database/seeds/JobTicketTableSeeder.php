<?php

use Illuminate\Database\Seeder;

class JobTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tbljobticket')->insert([
          'strJobTicketID' => 'JT00001',
          'strEmployeeID' => 'EMP00001', 
          'strStageID' => 'ST00001', 
          'strSubStageID' => 'SUBST00002', 
          'strJobOrdID' => 'JO-00001',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
