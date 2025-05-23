<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
  

    public function store()
    {
        Auth::logout();
        return redirect()->route('home'); // or 'login' if you prefer
    }
public function logout(Request $request)
{
    Auth::logout();
    return redirect()->route('home');
}

}
