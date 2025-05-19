<?php

namespace App\Http\Controllers;
use App\Models\AdministrationSection; 
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function up()
{
    Schema::create('administration_sections', function (Blueprint $table) {
        $table->id();
        $table->string('subtitle');
        $table->string('heading');
        $table->text('description');
        $table->timestamps();
    });
}

 public function about()
{
    $adminSection = \App\Models\AdministrationSection::first();

    if (!$adminSection) {
        abort(404, 'Administration section content not found.');
    }

    return view('templates.about', compact('adminSection'));
}

}
