<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\EmailsToMonitor as ETM;
class EmailsToMonitorController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
       // $emails = ETM::where(['user_id' => $user->id])->get();
        $emails = User::find($user->id)->emails;
        return view('monitoringemails.emails',['emails' => $emails, 'user' => $user]);
    }

    public function addemail(){
        $user = Auth::user();
        return view('monitoringemails.add',['user' => $user]);
    }

    public function addemailPost(Request $req){
        $email = $req->input('email');
        //$compromised = $req->input('compromised');
        //$leak = $req->input('leak_id');
        $user = Auth::user();

        if($email == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $em = new ETM();
            $em->email = $email;
            //$em->compromised = $compromised;
           // $em->leak_id = $leak;
            $em->user_id = $user->id;
            if($em->save()){
                return redirect('emails')->with('success','Email Added.');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the Email. Try again.');
            }
        }
    }

    public function editemail($id){
        $user = Auth::user();
        $email = ETM::find($id);
        return view('monitoringemails.edit',['email' => $email, 'user' => $user]);
    }

    public function editemailPost(Request $req){
        $email = $req->input('email');
       // $compromised = $req->input('compromised');
       // $leak = $req->input('leak');
        $id = $req->input('id');
        $user = Auth::user();

        if($email == null ||  $id == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $em = ETM::find($id);
            $em->email = $email;
            //$em->compromised = $compromised;
           // $em->leak_id = $leak;
            $em->user_id = $user->id;
            if($em->save()){
                return redirect('emails')->with('success','Email Updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in Updating the Email. Try again.');
            }
        }
    }

    public function deleteemail($id){
        $user = Auth::user();
        $email = ETM::where(['id' => $id]);
        if($email->count() > 0){
            if($email->first()->user_id == $user->id){
                if($email->first()->delete()){
                    return redirect()->back()->with('success','Email Deleted.');
                }else {
                    return redirect()->back()->with('error','Error occurred in deleting the Email. Try again.');
                }
            }else {
                return redirect()->back()->with('error','The email does not belong to you.');

            }
        }else {
            return redirect()->back()->with('error','No such email exists in the system.');
        }
    }

}
