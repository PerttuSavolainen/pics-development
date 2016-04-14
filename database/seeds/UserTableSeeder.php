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
        // resets the table before populating
        DB::table('user')->delete();
        
        $users = array(
            ["username" => "Hessu", "password" => "Hopo", "first_name" => "Hessu", "last_name" => "Hopo"],
            ["username" => "Aku", "password" => "Ankka", "first_name" => "Aku", "last_name" => "Ankka"],
            ["username" => "Iines", "password" => "Ankka", "first_name" => "Iines", "last_name" => "Ankka"],
            ["username" => "Roope", "password" => "Ankka", "first_name" => "Roope", "last_name" => "Ankka"],
        );
        
        DB::table('user')->insert($users);
        
    }
}
