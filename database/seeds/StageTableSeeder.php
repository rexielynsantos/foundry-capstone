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
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00002',
          'strStageName' => 'Molding',
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00003',
          'strStageName' => 'Fettling/Metal Treatment',
          'strStageDesc' => 'investment casting needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00004',
          'strStageName' => 'Final Quality Assurance',
          'strStageDesc' => 'quality assurance needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00005',
          'strStageName' => 'Injecting',
          'strStageDesc' => 'metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00006',
          'strStageName' => 'Water Debinding',
          'strStageDesc' => 'metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00007',
          'strStageName' => 'Drying',
          'strStageDesc' => 'for warm air, metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00008',
          'strStageName' => 'Thermal Debinding',
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00009',
          'strStageName' => 'Sintering',
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00010',
          'strStageName' => 'Heat Treatment',
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00011',
          'strStageName' => 'S-Blasting',
          'strStageDesc' => 'for metal injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00012',
          'strStageName' => 'Cleaning',
          'strStageDesc' => 'for plastic injection needs',
          'strStatus' => 'Active'
      ]);
      DB::table('tblstage')->insert([
          'strStageID' => 'ST00013',
          'strStageName' => 'Recovery',
          'strStageDesc' => 'for plastic injection needs',
          'strStatus' => 'Active'
      ]);
    }
}
