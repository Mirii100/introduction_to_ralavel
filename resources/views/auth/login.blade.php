@extends('layouts.base')
@section('title')
login 
@endsection


@section('content')

      <div class="hero-container">
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <h2 class="text-2xl mb-4 font-semibold">Login</h2>

        @if(session('status'))
            <div class="mb-4 text-red-500">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your email"
                       class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Your password"
                       class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Login
                </button>

            </div><span>
             dont have accounrt <a href="{{route('register')}}"class="p-3">Register</a></span>
        </form>
    </div>
</div>
      </div>
@endsection
<br><br><br><br><br><br>