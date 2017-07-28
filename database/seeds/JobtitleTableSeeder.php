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
          'strStatus' => 'Active'
      ]);
      DB::table('tbljobtitle')->insert([
          'strJobTitleID' => 'JT00002',
          'strJobTitleName' => 'Purchasing Manager',
          'strJobTitleDesc' => 'Purchasing Department Head',
          'strStatus' => 'Active'
      ]);
    }
}
