@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('styles')
<style>
        /* Container */
    .container {
        max-width: 1350px;
        margin: auto;
        padding: 30px;
        gap: 20px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="card p-5">
        <h1 class="card-header mb-4 text-center">🛒 Your Shopping Cart</h1>
        
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($cartItems->isEmpty())
        <div class="text-center">
            <i class="bi bi-cart-x"></i>
            <p class="mt-3">Your cart is empty. <a href="{{ route('home') }}" class="btn btn-outline-primary">Start Shopping</a></p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="align-middle">{{ $item->name }}</td>
                            <td class="align-middle">
                                <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" class="img-thumbnail" width="80">
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex justify-content-center">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control w-50 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm ms-2">Update</button>
                                </form>
                            </td>
                            <td class="align-middle">${{ number_format($item->price, 2) }}</td>
                            <td class="align-middle">${{ number_format($item->quantity * $item->price, 2) }}</td>
                            <td class="align-middle">
                                <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('cart.clear') }}" class="btn btn-warning">🗑️ Clear Cart</a>
        </div>
        @endif
    </div>
</div>
@endsection

