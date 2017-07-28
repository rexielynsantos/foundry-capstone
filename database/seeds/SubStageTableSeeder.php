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
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
      ]);

       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00002',
        'strSubStageName' => 'Primary Coating',
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00003',
        'strSubStageName' => 'Subsequent Coating',
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00005',
        'strSubStageName' => 'QA Inspection/Repair',
        'strSubStageDesc' => 'for quality assurance',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00006',
        'strSubStageName' => 'Casting',
        'strSubStageDesc' => 'for casting needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00007',
        'strSubStageName' => 'Leaching',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00008',
        'strSubStageName' => 'Grinding',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00009',
        'strSubStageName' => 'Annealing',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00010',
        'strSubStageName' => 'Sand-Blasting',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00011',
        'strSubStageName' => 'Rework',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00012',
        'strSubStageName' => 'Recoil Height/Flatness',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00013',
        'strSubStageName' => 'Stir-Up Mag.Box',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00014',
        'strSubStageName' => 'Welding',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00015',
        'strSubStageName' => 'Machining',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00016',
        'strSubStageName' => 'Final Sand-Blasting',
        'strSubStageDesc' => 'for metal treatment needs',
        'strStatus' => 'Active',
      ]);
       DB::table('tblsubstage')->insert([
        'strSubStageID' => 'SUBST00017',
        'strSubStageName' => 'QA Packing',
        'strSubStageDesc' => 'for quality assurance',
        'strStatus' => 'Active',
      ]);
    }
}
