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
          // 'strCastingID' => 'CD00001',
          'timeStarted' => '01:00:00',
          'created_at' => '2000-01-01 01:00:00',


      ]);
    }
}
