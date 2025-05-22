<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //


    public function index(){

$posts=Post::get();
$posts = Post::find(1);
$posts->title = "New Title";
$posts->save();


        return view('posts.index');
    }

    public function store(Request $request){

$this->validate($request,[
'body'=>'required'

]);
$request->user()->posts()->create(
    [
        'body'=>$request->body
    ]
);
return back();

    }
}
