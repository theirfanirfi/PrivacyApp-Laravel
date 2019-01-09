<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        return view('home',['user' => $user]);
    }

    public function changeEmailGet()
    {
        $user = Auth::user();
        return view('changemail',['user' => $user]);
    }

    public function changeEmail(Request $req)
    {
        $email = $req->input('email');
        $pass = $req->input('password');

        $user = Auth::user();

        if(Hash::check($pass,$user->password))
        {
            $user->email = $email;
            if($user->save())
            {
                return redirect()->back()->with('success','Email Changed.');
            }
            else
            {
                return redirect()->back()->with('error','Error occurred. Please try again.');

            }
        }
        else
        {
            return redirect()->back()->with('error','Incorrect Password');
        }
    }

    public function changepassword()
    {
        $user = Auth::user();
        return view('changepassword',['user' => $user]);
    }

    public function changePasswordPost(Request $req)
    {
        $oldPass = $req->input('old_password');
        $newPass = $req->input('new_password');

        $user = Auth::user();

        if(Hash::check($oldPass,$user->password))
        {
            $user->password = Hash::make($newPass);
            if($user->save())
            {
                return redirect()->back()->with('success','Password Changed.');
            }
            else
            {
                return redirect()->back()->with('error','Error occurred. Please try again.');

            }

        }
        else
        {
            return redirect()->back()->with('error','Incorrect old Password');
        }
    }
}
