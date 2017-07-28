<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00001',
          'strProductTypeName' => 'Investment Casting',
          'strProductTypeDesc' => 'This time tested process can produce different kinds of metal products at a wide range of sizes.',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00002',
          'strProductTypeName' => 'Metal Injection Moulding',
          'strProductTypeDesc' => 'Fast production cycle & tight tolerances make MIM ideal for bulk orders of small metal parts.',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00003',
          'strProductTypeName' => 'Plastic Injection',
          'strProductTypeDesc' => 'The industry standard for producing quality plastic parts',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00004',
          'strProductTypeName' => 'Automotive Parts',
          'strProductTypeDesc' => 'Heat treatment made of high heat resistance steel materials and product components for various customers in the manufacturing industry',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00005',
          'strProductTypeName' => 'Medical Tools',
          'strProductTypeDesc' => 'PFPI also has an FDA license to operate as a medical device manufacturer for our AISI 316L medical prosthesis and we can also produce quality dental tools.',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00006',
          'strProductTypeName' => 'Furniture Equipments',
          'strProductTypeDesc' => 'For different furnitures',
          'strStatus' => 'Active'
      ]);
      DB::table('tblproducttype')->insert([
          'strProductTypeID' => 'TYPE00007',
          'strProductTypeName' => 'Brass Sculpture',
          'strProductTypeDesc' => 'For artworks',
          'strStatus' => 'Active'
      ]);
    }
}
