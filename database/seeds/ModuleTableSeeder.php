<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblmodule')->insert([
          'strModuleID' => 'MOD00001',
          'strModuleName' => 'Job Order Processing',
          'strModuleDesc' => 'Job Order',
          'strDepartmentID' => 'DEPT00001',
          'strStatus' => 'Active'
      ]);
      DB::table('tblmodule')->insert([
          'strModuleID' => 'MOD00002',
          'strModuleName' => 'Sales Order Processing',
          'strModuleDesc' => 'Sales Order',
          'strDepartmentID' => 'DEPT00002',
          'strStatus' => 'Active'
      ]);
    }
}
