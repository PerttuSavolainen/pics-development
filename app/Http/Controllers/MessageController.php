<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Image;
use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index(Image $image) {
        return view('message.index', compact('image'));
    }
    
    public function create(Image $image) {
        return view('message.create', compact('image'));
    }
    
    public function store(Image $image) {

    }
    
    public function show(Image $image, Message $message) {
        return view('message.show', compact('image', 'message'));
    }    
    
    public function edit(Image $image, Message $message) {
        return view('message.edit', compact('image', 'message'));
    }  
    
    public function update(Image $image, Message $message) {
        
    }  
    
    public function destroy(Image $image, Message $message) {
        
    }     
    

    
}
