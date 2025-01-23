@extends('layouts.register')

@section('title', 'Login')

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
        }
        .btn-custom:hover {
            background-color: #495057;
        }
    </style>
@endsection
<!-- Custom styles end -->


<!-- Main content -->
@section('content')

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="form-container">
                    <h3 class="text-center">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Login</button>
                    </form>
                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ route('sign') }}">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Main content ends -->