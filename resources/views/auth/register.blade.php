@extends('layouts.register')

@section('title', 'Register')

@section('style')
<style>
    /* Set the background image and make it cover the entire page */
    body {
        background: #f8f9fa url('/images/ecom img.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    /* Set the style for the form container */
    .form-container {
        background: rgba(131, 106, 106, 0.62);
        padding: 30px;
        border-radius: 10px;

        /* Add a box shadow to give the form container a nice depth effect */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Set the style for the custom button */
    .btn-custom {
        background-color: #343a40;
        color: white;
        font-weight: bold;
    }

    /* Set the style for the custom button on hover */
    .btn-custom:hover {
        background-color: #495057;
    }
</style>
@endsection

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
                <h3 class="text-center" style="font-weight: bold;">{{__('Register')}}</h3>
                <!-- Form -->
                <form method="POST" action="{{ route('register') }}">
                    <!-- CSRF Token -->
                    @csrf
                    <!-- Name input -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                            <!-- Name errors -->
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                            <!-- Email errors -->
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Phone input -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <div>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}" required>
                            <!-- Phone errors -->
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Address input -->
                    <div class="mb-3">
                        <label for="address" class="form-label">{{ __('Address') }}</label>
                        <div>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}" required>
                            <!-- Address errors -->
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                            <!-- Password errors -->
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Confirm Password input -->
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <div>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div>
                        <button type="submit" class="btn btn-custom w-100">{{ __('Register') }}</button>
                    </div>
                </form>
                <!-- Already have an account link -->
                <p class="text-center mt-3">
                    {{__('Already have an account?')}} <a href="{{ route('login') }}" style="color: black;">{{__('Login')}}</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
