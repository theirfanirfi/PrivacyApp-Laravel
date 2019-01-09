<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //

    public function index()
    {
        return view('authentication.login');

    }

    public function signup(Request $req)
    {
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $email = $req->input('email');
        $pass = $req->input('pwd');

        if($first_name == null || $last_name == null || $email == null || $pass == null){
            return redirect()->back()->with('error','All Fields are required. None can be empty.');

        }else {
        $user = User::whereEmail($email)->count();
        if($user > 0)
        {
            return redirect()->back()->with('error','Email is already in used. Please use another one.');
        }
        else
        {
            $u = new User([

                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => Hash::make($pass)
            ]);

            if($u->save())
            {
                if(Auth::attempt(['email' => $email, 'password' => $pass]))
                {
                    return redirect('/home');
                }
                else
                {
                    return redirect()->back()->with('success','Registeration successful but error occurred during login. Please login manually.');
                }
            }
            else
            {
                return redirect()->back()->with('error','Error occurred. Please try again.');
            }
        }
    }

    }

    public function loginPost(Request $req)
    {
        $email = $req->input('email');
        $pass = $req->input('pwd');
        $user = User::whereEmail($email)->count();
        if($user > 0)
        {
            if(Auth::attempt(['email' => $email, 'password' => $pass]))
            {
                return redirect('/home');
            }
            else
            {
                return redirect()->back()->with('error','Login failed. Invalid Credentials.');
            }
        }
        else
        {
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/login');
        }
        else
        {
            return redirect('/login');

        }
    }

    public function signupGet()
    {
        return view('authentication.register');

    }
}
