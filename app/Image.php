<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // overrides the default prural-name using in queries
    protected $table = 'image';
    // needed for a mass assignment when passing array of data to create or update method
    protected $guarded = [];
    
    //
}
