<?php

use Illuminate\Database\Seeder;

class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00001',
          'strStageName' => 'Waxing',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00002',
          'strStageName' => 'Molding',
          'dblTimeRequired' => 2,
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00003',
          'strStageName' => 'Fettling/Metal Treatment',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 03:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00004',
          'strStageName' => 'Final Quality Assurance',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'quality assurance needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00005',
          'strStageName' => 'Injecting',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 05:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00006',
          'strStageName' => 'Water Debinding',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 06:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00007',
          'strStageName' => 'Drying',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for warm air, metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 07:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00008',
          'strStageName' => 'Thermal Debinding',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 08:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00009',
          'strStageName' => 'Sintering',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 09:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00010',
          'strStageName' => 'Heat Treatment',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 10:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00011',
          'strStageName' => 'S-Blasting',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 11:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00012',
          'strStageName' => 'Cleaning',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for plastic injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 12:00:00',
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00013',
          'strStageName' => 'Recovery',
          'dblTimeRequired' => 3,
          'strStageDesc' => 'for plastic injection needs',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 13:00:00',
      ]);
    }
}
