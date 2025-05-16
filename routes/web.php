<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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