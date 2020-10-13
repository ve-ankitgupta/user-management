<?php

namespace App\Helper;

use App\User;
use Illuminate\Support\Facades\Schema;

class Helper {
    
    public static function allowRegistration() {
        if (!Schema::hasTable('users'))
            return false;
            
        return !User::where('deleted_at', null)->count();
    }
}