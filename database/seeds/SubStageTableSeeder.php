<?php

use Illuminate\Database\Seeder;

class SubStageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00001',
        'strSubStageName' => 'Dewaxing',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);

       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00002',
        'strSubStageName' => 'Primary Coating',
        'dblTimeRequired' => 1,
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00003',
        'strSubStageName' => 'Subsequent Coating',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 03:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00005',
        'strSubStageName' => 'QA Inspection/Repair',
        'dblTimeRequired' => 3.5,
        'strSubStageDesc' => 'for quality assurance',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 04:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00006',
        'strSubStageName' => 'Casting',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 05:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00007',
        'strSubStageName' => 'Leaching',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 06:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00008',
        'strSubStageName' => 'Grinding',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 07:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00009',
        'strSubStageName' => 'Annealing',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 08:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00010',
        'strSubStageName' => 'Sand-Blasting',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 09:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00011',
        'strSubStageName' => 'Rework',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 10:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00012',
        'strSubStageName' => 'Recoil Height/Flatness',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 11:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00013',
        'strSubStageName' => 'Stir-Up Mag.Box',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 12:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00014',
        'strSubStageName' => 'Welding',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 13:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00015',
        'strSubStageName' => 'Machining',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 14:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00016',
        'strSubStageName' => 'Final Sand-Blasting',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 15:00:00',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00017',
        'strSubStageName' => 'QA Packing',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for quality assurance',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 16:00:00',
      ]);
        DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00018',
        'strSubStageName' => 'Cleaning',
        'dblTimeRequired' => 3,
        'strSubStageDesc' => 'for quality assurance',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 16:00:00',
      ]);
    }
}
