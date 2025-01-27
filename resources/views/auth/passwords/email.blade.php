@extends('layouts.register')

@section('style')
<style>
    body {
    background: #f8f9fa url('/images/ecom img.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 450px;
}


/* Form container style */
.form-container {
    background: rgba(131, 106, 106, 0.62);
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

.form-container .form-label {
    font-weight: bold;
}

/* Button style */
.btn-custom {
    background-color: #343a40;
    color: white;
    border-radius: 25px;
    padding: 10px 30px;
    font-weight: bold;
    transition: all 0.3s ease;
    border: none; /* Remove button borders */
}

/* Hover effect */
.btn-custom:hover {
    background-color: #495057;
}

</style>
@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <h3>{{ __('Reset Password') }}</h3>
        <p>{{ __('Enter your email address to receive a password reset link.') }}</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email field -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" required autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-custom w-100">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>
</div>

@endsection
