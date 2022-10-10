<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        if($request->email == null && $request->password == null){
            return view('login');
        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('manage');
            }else{
                return redirect()->route('login')->with('error','Incorrect Email or Password!');
            }
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|same:confirm_password',
        ]);


        $res = new User;
        $res->name = $request->name;
        $res->email = $request->email;
        $res->password = Hash::make($request->password);
        $res->save();
        return redirect()->route('login')->with('message','User Registered Successfully. Please Login!');
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login')->with('message','User Logged Out Successfully.');
        }else{
            return redirect()->route('login')->with('error','Something went wrong.');
        }
    }
}
