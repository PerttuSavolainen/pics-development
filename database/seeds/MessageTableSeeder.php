<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the table before populating
        DB::table('message')->delete();
        
        $messages = array(
            ["content" => "Viesti1 on tämä...", "user_id" => 2, "image_id" => 1],
            ["content" => "Viesti2 on tässä...", "user_id" => 3, "image_id" => 2],
            ["content" => "Viesti3 on tuossa...", "user_id" => 4, "image_id" => 1],
            ["content" => "Viesti4 on tämä...", "user_id" => 1, "image_id" => 2],
        );
        
        DB::table('message')->insert($messages);
    }
}
