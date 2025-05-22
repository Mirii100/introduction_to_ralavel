<?php

namespace App\Http\Controllers;

use App\Models\AdministrationSection;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    //

    public function index()
{
    $adminSection = AdministrationSection::first() ?? (object)[
        'subtitle' => 'N/A',
        'heading' => 'N/A',
        'description' => 'N/A',
        'years_of_excellence' => 0,
        'faculty_members' => 0,
        'student_success' => 0
    ];

    return view('templates.about', compact('adminSection'));
}

}
