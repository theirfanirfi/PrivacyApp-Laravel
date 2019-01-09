<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\SpamPhoneNumbers as SPN;
use App\Models\Companies as COMP;
class SpamPhoneNumbersController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        $spam = new SPN();
        $spams = $spam->getSpamWithCompany($user->id);
       // $spams = User::find($user->id)->co;

        return view('spamsphonenumbers.spams',['user' => $user,'spams' => $spams]);
    }

    public function addspam(){
        $user = Auth::user();
       // $companies = COMP::where(['user_id' => $user->id])->get();
       $companies = User::find($user->id)->companies;
        return view('spamsphonenumbers.add',['user' => $user,'companies' => $companies]);
    }

    public function editSpam($id){
        $user = Auth::user();
        $spam = SPN::find($id);
        $companies = COMP::where(['user_id' => $user->id])->get();
        return view('spamsphonenumbers.edit',['user' => $user,'companies' => $companies, 'spam' => $spam]);
    }

    public function addSpamPost(Request $req){
        $company_id = $req->input('company_id');
        $phone_number = $req->input('phone_number');
        $score = $req->input('score');
        $user = Auth::user();

        if($company_id == null || $phone_number == null || $score == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $spam = new SPN();
            $spam->company_id = $company_id;
            $spam->phone_number = $phone_number;
            $spam->score = $score;
            $spam->user_id = $user->id;
            if($spam->save()){
                return redirect('spams')->with('success','Spam Phone Number Added.');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the Spam Phone Number. Try again.');
            }
        }
    }

    public function editSpamPost(Request $req){
        $company_id = $req->input('company_id');
        $phone_number = $req->input('phone_number');
        $score = $req->input('score');
        $id = $req->input('id');
        $user = Auth::user();

        if($company_id == null || $phone_number == null || $score == null || $id == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $spam = SPN::find($id);
            $spam->company_id = $company_id;
            $spam->phone_number = $phone_number;
            $spam->score = $score;
            $spam->user_id = $user->id;
            if($spam->save()){
                return redirect('spams')->with('success','Spam Phone Number Updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in Updating the Spam Phone Number. Try again.');
            }
        }
    }

    public function deleteSpam($id){
        $user = Auth::user();
        $spam = SPN::where(['id' => $id]);
        if($spam->count() > 0){
            if($spam->first()->user_id == $user->id){
                if($spam->first()->delete()){
                    return redirect()->back()->with('success','Spam Phone Number Deleted.');
                }else {
                    return redirect()->back()->with('error','Error occurred in deleting the Spam phone number. Try again.');
                }
            }else {
                return redirect()->back()->with('error','The Spam phone number does not belong to you.');

            }
        }else {
            return redirect()->back()->with('error','No such Spam phone number exists in the system.');
        }
    }
}
