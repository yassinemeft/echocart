@extends('layouts.register')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Logout') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
