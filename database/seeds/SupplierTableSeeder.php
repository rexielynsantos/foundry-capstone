<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00001',
        'strSupplierName' => 'Wacker Neuson',
        'strSupStreet' => '14-A Malaya',
        'strSupBrgy' => 'Mandalay',
        'strSupCity' => 'Pasay',
        'strSupEmail' => 'wackerneuson@gmail.com',
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00002',
        'strSupplierName' => 'Millers Corp',
        'strSupStreet' => '235',
        'strSupBrgy' => 'Masigla',
        'strSupCity' => 'Caniogan',
        'strSupEmail' => 'millerscorp@gmail.com',
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
    }
}
