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
        'strNote' => '1. Delivery of finished will be expected 5-6 weeks for the parts after
        acceptance of the mold.
        2. The criteria for acceptance must be clearly spelled out in the purchase order.
        3. The term is 30 days.
        4. Price validity is 30 days away from date of quotation.',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);
    }
}
