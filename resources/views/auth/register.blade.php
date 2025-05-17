@extends('layouts.app')

@section('content')

<div class="flex justify-center">


<div class="w-8/12 bg-white p-6 rounded-lg ">
    register 
    <form action="{{route('register')}}" method="post">
@csrf
    <div class="mb-4">
        <label for="name" class="sr-only">Name</label>
        <input type="text" name="name" id="name" placeholder="your name " class="bg-gray-100 border-2 w-full p-4 rounder-lg" value="{{old('name')}}">
            @error('name')
            <div class="test-red">
                {{$message}}
            </div>
            @enderror
    </div>
      <div class="mb-4">
        <label for="username" class="sr-only">UserName</label>
        <input type="text" name="username" id="name" placeholder="your username " class="bg-gray-100 border-2 w-full p-4 rounder-lg @error('username') @enderror" 
         value="{{old('username')}}">

    </div>
      <div class="mb-4">
        <label for="email" class="sr-only">email</label>
        <input type="email" name="email" id="name" placeholder="your email " class="bg-gray-100 border-2 w-full p-4 rounder-lg @error('email') @enderror" value="{{old('email')}}">

    </div>
      <div class="mb-4">
        <label for="password" class="sr-only">password</label>
        <input type="password" name="password" id="passowrd" placeholder="your password " class="bg-gray-100 border-2 w-full p-4 rounder-lg @error('password') @enderror"value="{{old('password')}}">

    </div>
     <div class="mb-4">
        <label for="password_confirmation" class="sr-only">password Again </label>
        <input type="password" name="password_confirmation" id="passowrd" placeholder="repeat your  password " class="bg-gray-100 border-2 w-full p-4 rounder-lg @error('confirm_password') @enderror" value="">

    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full ">register</button>
    </div>
    </form>
</div>

</div>


@endsection