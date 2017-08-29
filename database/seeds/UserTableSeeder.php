<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'id' => 1,
          'name' => 'Rexielyn Santos',
          'email' => 'rexielynsantos@gmail.com',
          'password' => 'rexrex',

      ]);
        DB::table('users')->insert([
          'id' => 2,
          'name' => 'Sean Karel',
          'email' => 'seankarel@gmail.com',
          'password' => 'seaning',

      ]);
    }
}
