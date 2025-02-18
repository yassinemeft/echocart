@extends('layouts.app')

@section('title', 'Profile Page')

@section('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }
    .profile-container {
        max-width: 900px;
        margin: 50px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .profile-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        text-align: center;
    }
    .profile-image {
        position: relative;
    }
    .profile-image img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #343a40;
    }
    .upload-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background-color: #343a40;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        font-size: 14px;
        cursor: pointer;
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
    }
    .info-row:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: bold;
        color: #343a40;
    }
    .info-value {
        color: #6c757d;
    }
    .btn-action {
        background-color: #343a40;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }
    .btn-action:hover {
        background-color: #495057;

    }
    .btn-logout {
        background-color:rgb(168, 16, 32);
        color: white;
        border: none;               
        padding: 10px;
        border-radius: 2px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
        width: 100%;
        font-weight: bold;
    }
    .btn-logout:hover {
        background-color:rgb(235, 62, 79);
    }
    .request-history {
        margin-top: 30px;
    }
    .request-history h2 {
        font-size: 1.5rem;
        color: #343a40;
    }
    .request-item {
        background-color: #f1f3f5;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .request-item p {
        margin: 0;
        font-size: 1rem;
        color: #6c757d;
    }
    .btn-delete {
    background-color:rgb(168, 16, 32);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 2px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
    width: 100%;
    font-weight: bold;
}

.btn-delete:hover {
    background-color:rgb(235, 62, 79);
}
.info-value {
    align-content: center;
    color: #6c757d;
}

.alert-success {
        background-color: #dff0d8;
        color: #3e8e41;
        border-color: #d6e9c6;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 15px;
    }
        /* Product Card */
        .card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        text-align: center;
        padding-bottom: 8px;
    }

    /* Card Hover Effect */
    .card:hover {
        transform: scale(1.04);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    /* Product Image */
    .card-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Card Content */
    .card-body {
        padding: 10px;
        height: 90px;
    }

    .card-body h3 {
        font-size: 0.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 6px;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .price {
        font-weight: bold;
        color: #27ae60;
    }

    .rating {
        color: #f1c40f;
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="card p-3 profile-image d-flex align-items-center">
            @if(auth()->user()->profile_image != null)
                <img src="{{ auth()->user()->profile_image }}" alt="Profile Image" class="rounded-circle" width="150">
            @endif
            <label for="profile_image" class="display-5">{{ auth()->user()->name }}</label>
        </div>
    </div>

    @if (session('success'))
        <div class="alert-success my-5">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-info">
        <div class="info-row">
            <span class="info-label">Name:</span>
            <span class="info-value">{{ Auth::user()->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">{{ Auth::user()->email }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Password:</span>
            <span class="info-value">********</span>
        </div>
        <div class="info-row">
            <span class="info-label">Phone:</span>
            <span class="info-value">{{ Auth::user()->phone }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Address:</span>
            <span class="info-value">{{ Auth::user()->address }}</span>
        </div>
        <div class="info-row gap-3" style="justify-content: center;">
        <a class="btn-action" href="{{ route('profile.change') }}" style="text-decoration: none;">Edit Profile</a>
        @if (Route::has('password.request'))
            <a class="btn-action" href="{{ route('password.request') }}" style="text-decoration: none;">
                {{ __('Reset Your Password') }}
            </a>
        @endif
        </div>
    </div>

    <!-- Products Section -->
    <section class="products-section">
        <h2>My Products</h2>
        <div class="grid">
        @foreach ($products as $product)
            <div class="card">
                    <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none;">
                    <img src="{{ $product->imgUrl }}" alt="{{ $product->title }}" class="card-img">
                    <div class="card-body">
                        <h3>{{ Str::limit($product->title, 40) }}</h3>
                        <p class="product-meta">
                            <span class="price">${{ number_format($product->price, 2) }}</span>
                            <span class="rating">⭐{{ $product->stars }}</span>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5 fs-3">
            {{ $products->appends(request()->query())->links() }}    
        </div>
        <a class="btn btn-success rounded-pill px-4 py-2" href="{{ route('product.store') }}" style="text-decoration: none; font-weight: bold;">
            {{ __('Add Product') }}
        </a>
    </section>
    

    <div class="request-history">
        <h2>Request History</h2>
        <div class="request-item">
            <p><strong>Request #1</strong></p>
            <p>Date: 12 Jan 2024</p>
            <p>Status: Completed</p>
        </div>
        <div class="request-item">
            <p><strong>Request #2</strong></p>
            <p>Date: 25 Feb 2024</p>
            <p>Status: Pending</p>
        </div>
        <div class="request-item">
            <p><strong>Request #3</strong></p>
            <p>Date: 10 Mar 2024</p>
            <p>Status: In Progress</p>
        </div><br>
        <div>
          <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="btn-action btn-logout">Logout</button>
          </form><br>
            <button type="submit" class="btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Delete Account</button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('account.delete') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
