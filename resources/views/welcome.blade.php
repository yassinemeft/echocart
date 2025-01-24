@extends('layouts.register')

@section('title', 'Welcome to EchoCart')

@section('content')
<div class="text-center">
    <h1>Welcome to EchoCart!</h1>
    <p>Your favorite online store for amazing products.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
</div>
@endsection
