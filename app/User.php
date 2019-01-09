<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Companies;
use App\Models\EmailsToMonitor;
use App\Models\Licenses;
use App\Models\SpamPhoneNumbers;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies(){
        return $this->hasMany(Companies::class);
    }

    public function emails(){
        return $this->hasMany(EmailsToMonitor::class);
    }

    public function licenses(){
        return $this->hasMany(Licenses::class);
    }

    public function Spams(){
        return $this->hasMany(SpamPhoneNumbers::class);
    }
}
