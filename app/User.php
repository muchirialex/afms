<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    const CHECK_ACTIVE = '1';

    public function isAdmin() {
        return $this->type === self::ADMIN_TYPE;    
    }

    public function isActive() {
        return $this->status === self::CHECK_ACTIVE;
    }
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
