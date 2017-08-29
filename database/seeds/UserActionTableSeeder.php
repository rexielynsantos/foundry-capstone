<?php

use Illuminate\Database\Seeder;

class UserActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tbluseraction')->insert([
          'strUserActionID' => 'UA00001',
          'strUserActionName' => 'Sales Order Approver',
          'strUserActionDesc' => 'Approver of Sales Order',
          'strModuleID' => 'MOD00001',
          'strStatus' => 'Active',
      ]);
      DB::table('tbluseraction')->insert([
          'strUserActionID' => 'UA00002',
          'strUserActionName' => 'Job Order Approver',
          'strUserActionDesc' => 'Approver of Job Order',
          'strModuleID' => 'MOD00001',
          'strStatus' => 'Active',
      ]);
    }
}
