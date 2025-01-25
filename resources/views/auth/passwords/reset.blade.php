@extends('layouts.register')

@section('style')
<style>
    body {
        background: #f8f9fa url('/images/background.jpg') no-repeat center center fixed;
        background-size: cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 450px;
    }

    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }

    .form-container h3 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .btn-custom {
        background-color: #343a40;
        color: white;
        border-radius: 25px;
        padding: 10px 30px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #495057;
    }
</style>
@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <h3>{{ __('Reset Password') }}</h3>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Hidden token field -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email field -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Password field -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('New Password') }}</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Confirm password field -->
            <div class="mb-3">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-custom w-100">{{ __('Reset Password') }}</button>
        </form>
    </div>
</div>

@endsection
