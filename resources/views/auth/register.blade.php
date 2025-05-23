@extends('layouts.base')

@section('title')
register
@endsection

@section('content')
<div class="hero-container">
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h2 class="text-2xl mb-4 font-semibold">Register</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

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

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="program_id" class="sr-only">Select Program</label>
                    <select name="program_id" id="program_id"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('program_id') border-red-500 @enderror"
                        required>
                        <option value="">Select Program</option>
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                {{ $program->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('program_id')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                </div>

                <span>Have an account? <a href="{{ route('login') }}" class="text-blue-500 underline ml-2">Login</a></span>
            </form>
        </div>
    </div>
</div>
@endsection
