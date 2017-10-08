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
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00002',
          'strDepartmentName' => 'Admin',
          'strDepartmentDesc' => 'overall managing',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 02:00:00',
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00003',
          'strDepartmentName' => 'Production',
          'strDepartmentDesc' => 'For production',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 03:00:00',
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00004',
          'strDepartmentName' => 'Quality Insurance',
          'strDepartmentDesc' => 'In charge with inspection',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
      DB::table('tbldepartment')->insert([
          'strDepartmentID' => 'DEPT00005',
          'strDepartmentName' => 'Purchasing',
          'strDepartmentDesc' => 'In charge with purchasing',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 04:00:00',
      ]);
    }
}
