<?php

namespace App\Http\Controllers;

use App\Models\User;                       
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;           

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $program = $user->program;
        return view('dashboard', compact('user', 'program'));
    }

    public function update(Request $request)
{
    $user = Auth::user();  // now definitely App\Models\User

    $data = $request->validate([
        'name'     => 'required|max:255',
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed',
        'avatar'   => 'nullable|image|max:2048',
    ]);

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']);
    }

    if ($request->hasFile('avatar')) {
        $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
    }

    $user->update($data);  // ← Eloquent update() now available

    return redirect()->route('dashboard')->with('success', 'Profile updated.');
}

    public function generateFeePdf()
    {
        $user    = Auth::user();
        $program = $user->program;

        $pdf = PDF::loadView('pdf.fee_structure', compact('user', 'program'));
        return $pdf->download('fee-structure.pdf');
    }

      public function viewFeePdf()
    {
        $user    = Auth::user();
        $program = $user->program;

        $pdf = PDF::loadView('pdf.fee_structure', compact('user', 'program'));
        // Stream inline (browser preview)
        return $pdf->stream('fee-structure.pdf');
    }
     public function downloadFeePdf()
    {
        $user    = Auth::user();
        $program = $user->program;

        $pdf = PDF::loadView('pdf.fee_structure', compact('user', 'program'));
        // Force file download
        return $pdf->download('fee-structure.pdf');
    }


    public function payFee(Request $request)
{
    $user = Auth::user();

    // Validate the amount is a positive number
    $data = $request->validate([
        'amount' => 'required|numeric|min:0.01',
    ]);

    // Add to existing fees_paid
    $user->fees_paid += $data['amount'];
    $user->save();

    return redirect()
        ->route('dashboard')
        ->with('success', "Thank you! \${$data['amount']} has been recorded.");
}
}
