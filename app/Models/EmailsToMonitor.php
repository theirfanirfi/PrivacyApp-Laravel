<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class EmailsToMonitor extends Model
{
    //

    protected $table = "emails_to_monitor";
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo(User::class);
     }
}
