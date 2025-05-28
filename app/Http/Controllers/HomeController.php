<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
class HomeController extends Controller
{
    //

    public function index()
    {
  $featuredPrograms = Program::where('is_featured', true)->get(); // Or however you filter
        // Fetch other data if needed

        return view('templates.index', compact('featuredPrograms'));
    }
}
