<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthenticationLogs extends Model
{   

    protected $table = "authentication_logs";
    
    protected $fillable = [
        'user_id',
        'login_time',
        'logout_time',
        'browser_agent',
        'ip_address',
    ];
    
}