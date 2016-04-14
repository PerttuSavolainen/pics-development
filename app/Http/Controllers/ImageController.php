<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    public function index() {
        $images = Image::all();
        return view('image.index', compact('images'));
    }
    
    public function create() {
        return view('image.create');
    }
    
    public function store() {
        
    }
    
    public function show() {
        return view('image.show', compact('image'));
    }
    
    public function edit($id) {
        return view('image.edit', compact('image'));
    }
    
    public function update($id) {
        
    }
    
    public function destroy($id) {
        
    }
    
}
