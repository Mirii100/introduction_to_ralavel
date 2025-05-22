<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function for dashboard 

    public function index(){
//     dd(auth()->user()->name);//identifying tthrough name 
// dd(auth()->user()->posts);
    return view('dashboard');
    }


    public function store(Request $request)
{
// Access form data
$name = $request->input('name');
// Check if input exists
if ($request->has('email')) {
// Process email
}
// All input data as array
$data = $request->all();
// Validation
$validated = $request->validate([
'name' => 'required|max:255',
'email' => 'required|email|unique:users',
'password' => 'required|min:8|confirmed',
]);
// File upload
if ($request->hasFile('avatar')) {
$path = $request->file('avatar')->store('avatars');
}
}
}
