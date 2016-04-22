<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Image extends Model
{
    // overrides the default prural-name using in queries
    protected $table = 'image';
    // needed for a mass assignment when passing array of data to create or update method
    protected $guarded = [];
    
    /**
     * A static method for getting images by a search word
     * @return collection of images
     */
    public static function getSearchImages($search) {
        // returns collection of images
        return Image::where("id", "LIKE", "%$search%")
                            ->orWhere("alt_text", "LIKE", "%$search%")
                            ->orWhere("category", "LIKE", "%$search%")->get();
    }
    
    /**
     * A static method for getting images by date
     * @return collection of images
     */
    public static function getImagesByDate($offset, $amount) {
        
        // returns collection of images
        return Image::all()->sortBy('created_at')->skip($offset)->take($amount);
    }
    
    /**
     * A static method for getting all images with their messages
     * @return collection of images
     */
    public static function getImagesAndMessages($search = '') {
        
        // WIP
        
        $images = DB::table('image')
                    ->join('message', 'image.id', '=', 'message.image_id')
                    ->select('*')
                    ->where('alt_text', 'LIKE', "%$search%")
                    ->get();
                    
        return $images;
        
    }
    
    
}
