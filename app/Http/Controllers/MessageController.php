<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Image;
use App\Message;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Auth;

use Auth;
use Input;
use Redirect;
use Session;

class MessageController extends Controller
{
    public function index(Image $image) {
        //return view('message.index', compact('messages'));
    }
    
    public function create(Image $image) {
        //return view('message.create', compact('image'));
    }
    
    public function store(Image $image, Request $request) {
        
        if ($request->isMethod('post') && $request->has('content')) {
            
            $msg_content = $request->input('content');
            $img_id = $image->id;
            $user = Auth::user()->id;
            
            $data = array(
                'content' => $msg_content,
                'user_id' => $user,
                'image_id' => $img_id
            );
            
            Message::create($data);
            
            return Redirect::route('image.show', compact('img_id'))->with('message', 'Viesti lähetetty...');
        }            
        
    }
    
    public function show(Image $image, Message $message) {
        //return view('message.show', compact('image', 'message'));
    }    
    
    public function edit(Image $image, Message $message) {
        //return view('message.edit', compact('image', 'message'));
    }  
    
    public function update(Image $image, Message $message) {
        
    }  
    
    public function destroy(Image $image, Message $message) {
        
    }     
    

    
}
