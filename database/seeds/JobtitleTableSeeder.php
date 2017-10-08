<?php

use Illuminate\Database\Seeder;

class JobtitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tbljobtitle')->insert([
          'strJobTitleID' => 'JT00001',
          'strJobTitleName' => 'Admin Manager',
          'strJobTitleDesc' => 'Admin Department Head',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tbljobtitle')->insert([
          'strJobTitleID' => 'JT00002',
          'strJobTitleName' => 'Purchasing Manager',
          'strJobTitleDesc' => 'Purchasing Department Head',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
      DB::table('tbljobtitle')->insert([
          'strJobTitleID' => 'JT00003',
          'strJobTitleName' => 'Production Head',
          'strJobTitleDesc' => 'Production Department Head',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
       DB::table('tbljobtitle')->insert([
          'strJobTitleID' => 'JT00004',
          'strJobTitleName' => 'Purchasing Staff',
          'strJobTitleDesc' => 'Purchasing Department Staff',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
    }
}
