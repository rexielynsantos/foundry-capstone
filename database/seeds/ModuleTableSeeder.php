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
          'strModuleName' => 'Quotation',
          'strModuleDesc' => 'Quotation',
          'strDepartmentID' => 'DEPT00001',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
      DB::table('tblmodule')->insert([
          'strModuleID' => 'MOD00002',
          'strModuleName' => 'Sales Order Processing',
          'strModuleDesc' => 'Sales Order',
          'strDepartmentID' => 'DEPT00002',
          'strStatus' => 'Active',
          'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
