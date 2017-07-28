<?php

use Illuminate\Database\Seeder;

class UOMTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbluomtype')->insert([
        'strUOMTypeID' => 'UT00001',
        'strUOMTypeName' => 'Length',
        'strUOMTypeDesc' => 'for length dimensions',
        'strStatus' => 'Active',
      ]);
        DB::table('tbluomtype')->insert([
        'strUOMTypeID' => 'UT00002',
        'strUOMTypeName' => 'Mass',
        'strUOMTypeDesc' => 'for mass dimensions',
        'strStatus' => 'Active',
      ]);
        DB::table('tbluomtype')->insert([
        'strUOMTypeID' => 'UT00003',
        'strUOMTypeName' => 'Amount',
        'strUOMTypeDesc' => 'for counting',
        'strStatus' => 'Active',
      ]);
    }
}
