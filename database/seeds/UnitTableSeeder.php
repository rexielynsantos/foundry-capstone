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
        'strUOMName' => 'm',
        'strUOMDesc' => 'meters',
        'strUOMTypeID' => 'UT00001',
        'strStatus' => 'Inactive',
      ]);
        DB::table('tbluom')->insert([
        'strUOMID' => 'U00002',
        'strUOMName' => 'pcs',
        'strUOMDesc' => 'pieces',
        'strUOMTypeID' => 'UT00003',
        'strStatus' => 'Active',
      ]);
        DB::table('tbluom')->insert([
        'strUOMID' => 'U00003',
        'strUOMName' => 'g',
        'strUOMDesc' => 'grams',
        'strUOMTypeID' => 'UT00002',
        'strStatus' => 'Active',
      ]);
    }
}
