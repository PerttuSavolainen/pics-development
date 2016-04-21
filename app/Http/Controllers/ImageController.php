<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Image;
use App\Message;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MyCustomClasses\ImageHandler;
use App\Helpers;

use Input;
use Redirect;
use Session;
use Validator;

class ImageController extends Controller
{
    
    // folder where images will be uploaded
    private static $img_folder = 'img';
    // how many images will be loaded at a time
    private static $loadAmount = 2;
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    public function index(Request $request = null) {

        if ($request->has('pics-search')) {
            $images = Image::getSearchImages($request->input('pics-search'));
        }

        else {
            // return collection of all images
            $images = Image::all();
        }
        
        return view('image.index', compact('images'));

    }
    
    public function create() {
        return view('image.create');
    }
    
    public function store(Request $request) {
        
        if ($request->isMethod('post')) {
            
            $img = array('image' => $request->file('upload-file'));
            
            $rules = array('image' => 'required');
            $validator = Validator::make($img, $rules);
            
            // if validation is not success
            if ($validator->fails()) {
                return Redirect::route('image.index')->with('message', 'tiedosto virheellinen...');
            }
            
            else {
                if ($request->file('upload-file')->isValid()) {
                    $ext = $request->file('upload-file')->getClientOriginalExtension();
                    $filename = rand(111111, 999999) . '.' . $ext;
                    $request->file('upload-file')->move(self::$img_folder, $filename);
                    
                    // other stuff for the database
                    $alt_text = $request->input('alt-text');
                    $category = $request->input('category');
            
                    $input_data = array(
                        'alt_text' => $alt_text,
                        'category' => $category,
                        'user_id' => 1,
                        'image_url' => self::$img_folder . "/" . $filename
                    );
                    
                    Image::create($input_data);
                    
                    return Redirect::route('image.index')->with('message', 'Kuva lisätty...');

                }
                
                else return Redirect::route('image.index')->with('message', 'tiedosto virheellinen...');
            }

            //$generated_url = ImageHandler::imageResize($img);

            //$input_data = $request->all(); // WIP
            
            //return Redirect::route('image.index')->with('message', var_dump($img));

        }

    }
    
    
    public function show($id) {
        
        // load single image by its primary key
        $image = Image::find($id);
        
        // return collection of messages
        $messages = Message::where("image_id", $id)->get();

        return view('image.show', compact('image', 'messages'));
        
    }
    
    public function edit($id) {
        return view('image.edit', compact('image'));
    }
    
    public function update($id) {
        
    }
    
    public function destroy($id) {
        
    }
    
    public function loadMoreImages(Request $request) {
        
        $offset = $request->file('callTime') * self::$loadAmount;
        
        $images = Image::getImagesByDate($offset, self::$loadAmount);
        
        return $offset;
        //return $images;
        
    }
    
    
    
}
