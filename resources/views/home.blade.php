@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to EchoCart</h1>
        <p>Your online store for awesome products.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Browse Products</a>
    </div>
@endsection