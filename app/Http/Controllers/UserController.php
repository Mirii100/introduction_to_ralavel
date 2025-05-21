<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //


    public function index()
{
$users = User::all();
return view('users.index', ['users' => $users]);
}
public function show(User $user)
{
return view('users.show', ['user' => $user]);
}
public function store(Request $request)
{
$validated = $request->validate([
'name' => 'required|max:255',
'email' => 'required|email|unique:users',
]);
$user = User::create($validated);
return redirect()->route('users.show', $user);
}
}
