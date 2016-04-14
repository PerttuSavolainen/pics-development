<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the table before populating
        DB::table('image')->delete();
        
        $images = array(
            ["user_id" => 1, "image_url" => "testi", "category" => "taiteellinen"],    
            ["user_id" => 2, "image_url" => "testi2", "category" => "ihmiset"],    
            ["user_id" => 3, "image_url" => "testi3", "category" => "jotain"],    
        );
        
        DB::table('image')->insert($images);
    }
}
