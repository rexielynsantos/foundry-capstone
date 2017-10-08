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
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblemployee')->insert([
          'strEmployeeID' => 'EMP00002',
          'strEmployeeLast' => 'Santos',
          'strEmployeeFirst' => 'Rexielyn',
          'strEmployeeMiddle' => 'S.C.',
          'strEmployeeEmail' => 'rexielynsantos@gmail.com',
          'strEmployeeContact' => '09975212842',
          'strJobTitleID' => 'JT00002',
          'strDepartmentID' => 'DEPT00005',
          'strEmployeeImagePath' => '',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblemployee')->insert([
          'strEmployeeID' => 'EMP00003',
          'strEmployeeLast' => 'Afable',
          'strEmployeeFirst' => 'Maria Polene',
          'strEmployeeMiddle' => 'V.',
          'strEmployeeEmail' => 'plnfbl@gmail.com',
          'strEmployeeContact' => '09216545678',
          'strJobTitleID' => 'JT00003',
          'strDepartmentID' => 'DEPT00003',
          'strEmployeeImagePath' => '',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblemployee')->insert([
          'strEmployeeID' => 'EMP00004',
          'strEmployeeLast' => 'Palisoc',
          'strEmployeeFirst' => 'Andrei Lexan',
          'strEmployeeMiddle' => 'S.',
          'strEmployeeEmail' => 'lexan@gmail.com',
          'strEmployeeContact' => '09246595678',
          'strJobTitleID' => 'JT00004',
          'strDepartmentID' => 'DEPT00002',
          'strEmployeeImagePath' => '',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
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
