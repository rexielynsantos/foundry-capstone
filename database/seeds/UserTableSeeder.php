<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
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
          'name' => 'Administrator',
          'email' => 'rexielynsantos@gmail.com',
          'password' => 'admin',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),


      ]);
        
    }
}
