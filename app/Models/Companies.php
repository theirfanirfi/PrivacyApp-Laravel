<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\SpamPhoneNumbers;
class Companies extends Model
{
    //

    protected $table = "companies";
    protected $primaryKey = "id";

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function spams($user_id){
return $this->belongsToMany(SpamPhoneNumbers::class)->where('user_id','=',$user_id);
    }
}
