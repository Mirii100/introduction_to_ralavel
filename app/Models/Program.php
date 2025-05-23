<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    public function index()
{
    $programs = Program::all();
    return view('frontend.featured-programs', compact('programs'));
}
}
