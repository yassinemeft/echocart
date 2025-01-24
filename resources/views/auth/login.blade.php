@extends('layouts.register')

@section('title', 'Login')

<!-- Custom styles -->
@section('style')
<style>

        /* Set the background image and make it cover the entire page */
        body {
            background: #f8f9fa url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Set the style for the form container */
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;

            /* Add a box shadow to give the form container a nice depth effect */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        /* Set the style for the custom button */
        .btn-custom {
            background-color: #343a40;
            color: white;
        }

        /* Set the style for the custom button on hover */

        .btn-custom:hover {
            background-color: #495057;
        }
    </style>
@endsection
<!-- Custom styles end -->


<!-- Main content -->
@section('content')

<!-- Container for the form -->
<div class="container mt-5">
        <!-- Row for the form -->
        <div class="row justify-content-center">
            <!-- Column for the form -->
            <div class="col-md-5">
                <!-- Form container -->
                <div class="form-container">
                    <!-- Title -->
                    <h3 class="text-center">{{__('Login')}}</h3>
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        <!-- CSRF Token -->
                        @csrf
                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required>
                                <!-- Email errors -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('Password')}}</label>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                                <!-- Password errors -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div>
                            <button type="submit" class="btn btn-custom w-100">{{__('Login')}}</button>
                            <!-- Forgot password link -->
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                        </div>
                        <!-- Remember me checkbox -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Sign up link -->
                    <p class="text-center mt-3">
                        {{__('Don\'t have an account?')}} <a href="{{ route('register') }}">{{__('Register')}}</a>

                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- Main content ends -->


