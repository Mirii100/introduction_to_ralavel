//extending layout  
@extends('layouts.app')

@section('content')

<div class="flex justify-center">


<div class="w-8/12 bg-white p-6 rounded-lg ">
    hello this is posts 
    <form action="{{route('posts')}}" method="post">
        @csrf
<div class="mb-4">
    <label for="body" class="sr-only">Body</label>
    <textarea name="body"placeholder="post something" id="body"cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg">

    </textarea>
    @error('body')
    <div class="text-red-500 mt-2 text-sm">
        {{$message}}
    </div>
    @enderror

</div>

<div>
    <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
        Post
    </button>

</div>
    </form>
@if ($posts=>count())
@foreach($posts as $posts)
<div>$post</div>
@endforeach

@else
<p>there are no posts </p>
@endif



</div>

</div>


@endsection
