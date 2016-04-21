<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // overrides the default prural-name using in queries
    protected $table = 'message';
    // needed for a mass assignment when passing array of data to create or update method
    protected $guarded = [];
    
}
