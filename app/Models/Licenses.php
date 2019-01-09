<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Licenses extends Model
{
    //

    protected $table = "licenses";
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo(User::class);
     }
}
