<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function for dashboard 

    public function index(){
    dd(auth()->user());
        return view('dashboard');
    }
}
