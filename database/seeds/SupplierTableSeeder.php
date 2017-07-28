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
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00002',
        'strSupplierName' => 'Millers Corp',
        'strSupStreet' => '235',
        'strSupBrgy' => 'Masigla',
        'strSupCity' => 'Caniogan',
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
      ]);
    }
}
