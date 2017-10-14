<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbluom')->insert([
        'strUOMID' => 'U00001',
        'strUOMName' => 'ml',
        'strUOMDesc' => 'mililiters',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tbluom')->insert([
        'strUOMID' => 'U00002',
        'strUOMName' => 'pcs',
        'strUOMDesc' => 'pieces',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
        DB::table('tbluom')->insert([
        'strUOMID' => 'U00003',
        'strUOMName' => 'g',
        'strUOMDesc' => 'grams',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 03:00:00',
      ]);
    }
}
