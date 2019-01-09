<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;
use App\Models\Companies;
class SpamPhoneNumbers extends Model
{
    //

    protected $table = "spam_phone_numbers";
    protected $primaryKey = "id";

    public function getSpamWithCompany($user_id){
        return DB::table('spam_phone_numbers')
        ->leftjoin('companies',['companies.id' => 'spam_phone_numbers.company_id'])->select('spam_phone_numbers.id as spam_id','spam_phone_numbers.*','companies.*')
        ->get();
    }

    public function user(){
        return $this->belongsTo(User::class);
     }

     public function company(){
        return $this->belongsTo(Companies::class);
     }
}
