@extends('layouts.register')
@section('title', 'Reset Password')
@section('style')
    <!-- Custom styles for this page -->
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

@section('content')

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="form-container">
                    <h3 class="text-center">{{__('Sign up')}}</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('Name')}}</label>
                            <div>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your full name" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('Email Address')}}</label>
                            <div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <div>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm your password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">{{__('Register')}}</button>
                    </form>
                    <p class="text-center mt-3">
                        {{__('Already have an account?')}} <a href="{{ route('login') }}">{{__('Login')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection