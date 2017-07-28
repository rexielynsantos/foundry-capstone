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
      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00001',
      'strSubStageID' => 'SUBST00002',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00002',
      'strSubStageID' => 'SUBST00001',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00001',
      ]);

      DB::table('tblstagedetail')->insert([
      'strStageID' => 'ST00003',
      'strSubStageID' => 'SUBST00002',
      ]);
    }
}
