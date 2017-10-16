<?php

use Illuminate\Database\Seeder;

class StageDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //waxing
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00001',
      'strSubStageID' => 'SUBST00007',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00001',
      'strSubStageID' => 'SUBST00005',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00001',
      'strSubStageID' => 'SUBST00017',
      ]);
      //mold shop


      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00002',
      'strSubStageID' => 'SUBST00001',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00002',
      'strSubStageID' => 'SUBST00002',
      ]);
       DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00002',
      'strSubStageID' => 'SUBST00003',
      ]);
       DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00002',
      'strSubStageID' => 'SUBST00017',
      ]);

       //fettling

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00007',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00008',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00009',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00010',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00012',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00013',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00014',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00015',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00016',
      ]);
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00004',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00005',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00006',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00007',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00008',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00009',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00010',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00011',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00012',
      'strSubStageID' => 'SUBST00017',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00013',
      'strSubStageID' => 'SUBST00017',
      ]);
    }
}
