<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00001',
          'strDepartmentName' => 'Human Resource',
          'strDepartmentDesc' => 'for employee managing',
          'strStatus' => 'Active'
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00002',
          'strDepartmentName' => 'Admin',
          'strDepartmentDesc' => 'overall managing',
          'strStatus' => 'Active'
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00003',
          'strDepartmentName' => 'Production',
          'strDepartmentDesc' => 'For production',
          'strStatus' => 'Active'
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00004',
          'strDepartmentName' => 'Quality Insurance',
          'strDepartmentDesc' => 'In charge with inspection',
          'strStatus' => 'Active'
      ]);
    }
}
