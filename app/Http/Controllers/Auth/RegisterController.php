<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //create our function 

    public function index(){

        return view('auth.register');
    }
    public function store(Request $request)
    {
        //die-do or kill the page dd
       // dd('cool ');


       //validate 
//dd($request->email);
        $this->validate($request,
        [
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255', 
            'password'=>'required|confirmed',
            
            ]
        );

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::$request->password,//used for hashing
        ]
        );

        
dd('store');

       //storeuser

        //sign user in 
auth()->user();
auth()->attempt($request->only('email','password'));


       //redirect
       return redirect()->route('dashboard');
    }
}
