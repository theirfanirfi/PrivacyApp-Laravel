<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Companies as COMP;
use App\User;
class CompaniesController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        //$companies = COMP::where(['user_id' => $user->id])->get();
        $companies = User::find($user->id)->companies;
        return view('companies.companies',['user' => $user,'companies' => $companies]);
    }

    public function addCompany(){
        $user = Auth::user();
        return view('companies.add',['user' => $user]);
    }

    public function addCompanyPost(Request $req){
        $country = $req->input('country');
        $score = $req->input('score');
        $main_activity = $req->input('main_activity');
        $company_name = $req->input('company_name');
        $user = Auth::user();

        if($country == null || $score == null || $main_activity == null || $company_name == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $comp = new COMP();
            $comp->country = $country;
            $comp->score = $score;
            $comp->main_activity = $main_activity;
            $comp->user_id = $user->id;
            $comp->company_name = $company_name;
            if($comp->save()){
                return redirect('companies')->with('success','Company Added.');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the Company. Try again.');
            }
        }
    }

    public function editCompany($id){
        $user = Auth::user();
        $company = COMP::find($id);
        return view('companies.edit',['user' => $user,'company' => $company]);
    }


    public function editCompanyPost(Request $req){
        $country = $req->input('country');
        $score = $req->input('score');
        $main_activity = $req->input('main_activity');
        $company_name = $req->input('company_name');
        $id = $req->input('id');
        $user = Auth::user();

        if($country == null || $score == null || $main_activity == null || $id == null|| $company_name == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $comp = COMP::find($id);
            $comp->country = $country;
            $comp->score = $score;
            $comp->main_activity = $main_activity;
            $comp->company_name = $company_name;
            $comp->user_id = $user->id;
            if($comp->save()){
                return redirect('companies')->with('success','Company Updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in Updating the Company. Try again.');
            }
        }
    }

    public function deleteCompany($id){
        $user = Auth::user();
        $comp = COMP::where(['id' => $id]);
        if($comp->count() > 0){
            if($comp->first()->user_id == $user->id){
                if($comp->first()->delete()){
                    return redirect()->back()->with('success','Company Deleted.');
                }else {
                    return redirect()->back()->with('error','Error occurred in deleting the Company. Try again.');
                }
            }else {
                return redirect()->back()->with('error','The Company does not belong to you.');

            }
        }else {
            return redirect()->back()->with('error','No such Company exists in the system.');
        }
    }
}
