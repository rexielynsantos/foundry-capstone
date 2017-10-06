<?php

use Illuminate\Database\Seeder;

class TermsConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tbltermscondition')->insert([
        'strTermID' => 'TERM00001',
        'strModuleID' => 'MOD00001',
        'strNote' => 'NOTES',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
