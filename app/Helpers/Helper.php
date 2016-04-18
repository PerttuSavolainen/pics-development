<?php

namespace App\Helpers;

use Request;

/*
 *   Custom class for helper methods
 */

class Helper {
    
    public static function set_nav_active($uri) {
        return Request::is($uri) ? 'active active-pics' : '';
    }
    
}