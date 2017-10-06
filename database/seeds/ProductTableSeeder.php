<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblproduct')->insert([
            'strProductID' => 'PROD00001',
            'strProductName' => 'Bracket Wheel Mount',
            'strProductTypeID' => 'TYPE00001',
            'strProductDesc' => 'description',
            'strStatus' => 'Active',
            'created_at' => '2000-01-01 01:00:00',
        ]);
        DB::table('tblproduct')->insert([
            'strProductID' => 'PROD00002',
            'strProductName' => 'PV-025',
            'strProductTypeID' => 'TYPE00002',
            'strProductDesc' => 'description',
            'strStatus' => 'Active',
            'created_at' => '2000-01-01 02:00:00',
        ]);
        DB::table('tblproduct')->insert([
            'strProductID' => 'PROD00003',
            'strProductName' => 'Net Bracket',
            'strProductTypeID' => 'TYPE00003',
            'strProductDesc' => 'description',
            'strStatus' => 'Active',
            'created_at' => '2000-01-01 03:00:00',
        ]);
        DB::table('tblproduct')->insert([
            'strProductID' => 'PROD00004',
            'strProductName' => 'Art Fossil',
            'strProductTypeID' => 'TYPE00003',
            'strProductDesc' => 'description',
            'strStatus' => 'Active',
            'created_at' => '2000-01-01 04:00:00',
        ]);
    }
}
