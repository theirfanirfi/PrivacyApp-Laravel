<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licenses;
use Auth;
use App\User;
class LicensesController extends Controller
{
    //
    public function index(){
        $user  = Auth::user();
        //$licenses = Licenses::where(['user_id' => $user->id])->get();
        $licenses = User::find($user->id)->licenses;
        return view('licenses.licenses',['licenses' => $licenses, 'user' => $user]);
    }

    public function addlicense(){
        $user  = Auth::user();
        return view('licenses.add',['user' => $user]);
    }

    public function editlicense($id){
        $user  = Auth::user();
        $licence = Licenses::find($id);
        return view('licenses.edit',['user' => $user, 'license'=> $licence]);
    }

    public function addlicensePost(Request $req){
        $active = $req->input('active');
        $type = $req->input('type');
        $description = $req->input('description');
        $user = Auth::user();

        if($active == null || $type == null || $description == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $licence = new Licenses();
            $licence->active = $active;
            $licence->type = $type;
            $licence->description = $description;
            $licence->user_id = $user->id;
            if($licence->save()){
                return redirect('licenses')->with('success','License Added.');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the License. Try again.');
            }
        }
    }

    public function editlicensePost(Request $req){
        $active = $req->input('active');
        $type = $req->input('type');
        $description = $req->input('description');
        $id = $req->input('id');
        $user = Auth::user();

        if($active == null || $type == null || $description == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');
        }else{
            $licence = Licenses::find($id);
            $licence->active = $active;
            $licence->type = $type;
            $licence->description = $description;
            $licence->user_id = $user->id;
            if($licence->save()){
                return redirect('licenses')->with('success','License Updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in Updating the License. Try again.');
            }
        }
    }




    public function deletelicense($id){
        $user = Auth::user();
        $license = Licenses::where(['id' => $id]);
        if($license->count() > 0){
            if($license->first()->user_id == $user->id){
                if($license->first()->delete()){
                    return redirect()->back()->with('success','License Deleted.');
                }else {
                    return redirect()->back()->with('error','Error occurred in deleting the License. Try again.');
                }
            }else {
                return redirect()->back()->with('error','The license does not belong to you.');

            }
        }else {
            return redirect()->back()->with('error','No such license exists in the system.');
        }
    }
}
