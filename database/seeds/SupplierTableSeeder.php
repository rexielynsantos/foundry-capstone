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
        'strSupStreet' => '9-A Malaya',
        'strSupBrgy' => 'Mandalay',
        'strSupCity' => 'Pasay City',
        'strSupEmail' => 'wackerneuson@gmail.com',
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 01:00:00',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00002',
        'strSupplierName' => 'Millers Corp',
        'strSupStreet' => '20-A',
        'strSupBrgy' => 'Masigla',
        'strSupCity' => 'Pasig City',
        'strSupEmail' => 'millerscorp@gmail.com',
        'strSupplierDesc' => 'refettling needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00003',
        'strSupplierName' => 'Omya Mineral Philippines Inc.',
        'strSupStreet' => '23',
        'strSupBrgy' => 'Mendez',
        'strSupCity' => 'Quezon City',
        'strSupEmail' => 'omyaphilcorp@gmail.com',
        'strSupplierDesc' => 'mineral needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00004',
        'strSupplierName' => 'Atlas Copco Philippines',
        'strSupStreet' => 'Lot 12 Block 2,',
        'strSupBrgy' => 'North Main Avenue',
        'strSupCity' => 'Binan Laguna',
        'strSupEmail' => 'atlascopco@gmail.com',
        'strSupplierDesc' => 'mineral needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
        DB::table('tblsupplier')->insert([
        'strSupplierID' => 'SUP00005',
        'strSupplierName' => 'Ionique Mineral Resources Philippines Corporation',
        'strSupStreet' => 'Prieto Bldg., Panganiban Dr',
        'strSupBrgy' => 'Dinaga',
        'strSupCity' => 'Naga, Camarines Sur',
        'strSupEmail' => 'ioniquemineral@gmail.com',
        'strSupplierDesc' => 'mineral needs',
        'strStatus' => 'Active',
        'created_at' => '2000-01-01 02:00:00',
      ]);
    }
}
