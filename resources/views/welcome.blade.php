@extends('layouts.register')

@section('title', 'Welcome to EchoCart')
@section('style')
<style>
        body {
            background: url('/images/hero.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
        .welcome-container {
            background: rgba(131, 106, 106, 0.62);
            padding: 30px 50px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .welcome-container h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .welcome-container p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .welcome-container .btn-primary {
            background-color:rgb(0, 0, 0);
            border: none;
        }
        .welcome-container .btn-secondary {
            background-color:rgb(255, 255, 255);
            border: none;
            color: black;
        }
        .welcome-container .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            margin: 0 10px;
            transition: transform 0.3s, background-color 0.3s;
        }
        .welcome-container .btn:hover {
            background-color: #6c757d;
        }
        .welcome-container .btn-primary:hover {
            background-color: #495057;
        }
        .welcome-container .btn-secondary:hover {
            background-color: #495057;
            
        }
        
    </style>
@endsection
@section('content')
<div class="welcome-container">
        <h1>Welcome to EchoCart!</h1>
        <p>Your favorite online store for amazing products.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    </div>
@endsection
