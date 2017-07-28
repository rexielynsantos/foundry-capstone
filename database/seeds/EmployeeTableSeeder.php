<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblemployee')->insert([
          'strEmployeeID' => 'EMP00001',
          'strEmployeeLast' => 'Manuel',
          'strEmployeeFirst' => 'Jhonny',
          'strEmployeeMiddle' => 'Cruz',
          'strEmployeeEmail' => 'Crsdsdsuz',
          'strEmployeeContact' => '09090909090',
          'strJobTitleID' => 'JT00001',
          'strDepartmentID' => 'DEPT00001',
          'strEmployeeImagePath' => '',
          'strStatus' => 'Active'
      ]);
      // DB::table('tblemployee')->insert([
      //     'strEmployeeID' => 'EMP00002',
      //     'strEmployeeLast' => 'Santos',
      //     'strEmployeeFirst' => 'Rexielyn',
      //     'strEmployeeMiddle' => 'Sta.Cataline',
      //     'strJobTitleID' => 'JT00002',
      //     'strDepartmentID' => 'DEPT00002',
      //     'strEmployeeImagePath' => '',
      //     'strStatus' => 'Active'
      // ]);
    }
}
