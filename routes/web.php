<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('templates.index');
})->name('home');

// Route::get('/about', function () {
//     //to call the path use 
//     //nameof folder.name_of_the_file
//     //you can also pass second agument in return view  likke
//     //,["name"=>"Alexander "]
//     return view('about.about',["name"=>"Alexander "]);
// });
Route::get('/contacts', function () {
    //to call the path use 
    //nameof folder.name_of_the_file
    //you can also pass second agument in return view  likke
    //,["name"=>"Alexander "]
    return view('homepage.home',["name"=>"Alexander "]);
});
Route::get('/teas',function(){
$teas=[
   [ "name"=>"masala","price"=>10,"id"=>1],
     [ "name"=>"ginger","price"=>20,"id"=>2],
       [ "name"=>"Assam","price"=>10,"id"=>3],
      [ "name"=>"chai","price"=>10,"id"=>4],
];
    return view('teas.tea',['teas'=>$teas]);
});

// handling and id 
Route::get('/teas/{id}',function($id){
$teas=[
   [ "name"=>"masala","price"=>10,"id"=>1],
     [ "name"=>"ginger","price"=>20,"id"=>2],
       [ "name"=>"Assam","price"=>10,"id"=>3],
      [ "name"=>"chai","price"=>10,"id"=>4],
];
    return view('teas.teadetails',['tea'=>$teas[$id -1]]);
});

//starting a new instance instance in second lecture 
Route::get('/post',function(){

    return view('posts.post');
});
// adding controller route  and its name 
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

//login controller 
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
// dashboard 
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//logout
Route::get('/logout',[LogoutController::class,'store'])->name('logout');
//posts controller 

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);


Route::get('/', function () {
    return view('templates.index');
})->name('home');



Route::get('/about', [AdministrationController::class, 'index'])->name('about');

Route::get('/admissions', function () {
    return view('templates.admissions');
})->name('admissions');

Route::get('/academics', function () {
    return view('templates.academics');
})->name('academics');

Route::get('/faculty-staff', function () {
    return view('templates.faculty-staff');
})->name('faculty-staff');

Route::get('/campus-facilities', function () {
    return view('templates.campus-facilities');
})->name('campus-facilities');

Route::get('/students-life', function () {
    return view('templates.students-life');
})->name('students-life');

Route::get('/news', function () {
    return view('templates.news');
})->name('news');

Route::get('/events', function () {
    return view('templates.events');
})->name('events');

Route::get('/alumni', function () {
    return view('templates.alumni');
})->name('alumni');

Route::get('/news-details', function () {
    return view('templates.news-details');
})->name('news-details');

Route::get('/event-details', function () {
    return view('templates.event-details');
})->name('event-details');

Route::get('/privacy', function () {
    return view('templates.privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('templates.terms-of-service');
})->name('terms');

Route::get('/404', function () {
    return view('templates.404');
})->name('404');

Route::get('/starter-page', function () {
    return view('templates.starter-page');
})->name('starter-page');

Route::get('/contact', function () {
    return view('templates.contact');
})->name('contact');


use Illuminate\Support\Facades\Artisan;

Route::get('/migrate-production', function () {
    Artisan::call('migrate', ['--force' => true]);
    return '✅ Migrations executed successfully on Render.';
});
