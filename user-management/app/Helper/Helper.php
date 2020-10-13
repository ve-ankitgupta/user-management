<?php

namespace App\Helper;

use App\User;
use Illuminate\Support\Facades\Schema;

class Helper {
    
    /**
     * allow to disable registration feature
     *  check if any user exists then disable registration
     *  else allow to register
     * 
     * @return bool
     */
    public static function allowRegistration() {
        if (!Schema::hasTable('users'))
            return false;
            
        return !User::where('deleted_at', null)->count();
    }
}