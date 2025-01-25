@extends('layouts.register')

@section('title', 'Sign up')

<!-- Custom styles -->
@section('style')
<style>
        body {
            background: #f8f9fa url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #343a40;
            color: white;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
    </style>
@endsection
<!-- Custom styles end -->

@section('content')

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="form-container">
                    <h3 class="text-center">Sign Up</h3>
                    <form method="POST" action="{{ route('sign') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Sign Up</button>
                    </form>
                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection