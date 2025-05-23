<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Program;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller

{
  public function index()
{
    $programs = Program::all();
    return view('auth.register', compact('programs'));
}
   public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'username' => 'required|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|confirmed',
        'program_id' => 'required|exists:programs,id', // ✅ Correct validation rule
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // ✅ Create the user with program_id
    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'program_id' => $request->program_id,
    ]);

    Auth::login($user);

    return redirect()->route('dashboard');
}

}
