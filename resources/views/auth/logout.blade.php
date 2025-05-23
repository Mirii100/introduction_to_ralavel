
@extends('layouts.base')
@section('title')
logout 
@endsection


@section('content')

<form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" style="background:none; border:none; color:#007bff; cursor:pointer; padding:0;">
        Logout
    </button>
</form>

@endsection