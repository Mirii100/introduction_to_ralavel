<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    //to call the path use 
    //nameof folder.name_of_the_file
    //you can also pass second agument in return view  likke
    //,["name"=>"Alexander "]
    return view('about.about',["name"=>"Alexander "]);
});
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