@extends('layouts.app')

@section('title', 'Product Collection')

<!-- Custom styles -->
@section('styles')
<style>
    /* Global Styles */
    body {
        background: #f4f7f6;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Container */
    .container {
        max-width: 1300px;
        margin: auto;
        padding: 15px;
        display: flex;
        gap: 20px;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 200px;
        height: 10%;
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    }

    .filter-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .filter-group {
        margin-bottom: 20px;
    }

    .filter-group label {
        font-size: 0.9rem;
        color: #333;
        font-weight: 500;
    }

    .filter-group input,
    .filter-group select {
        width: 100%;
        margin-top: 5px;
    }

    .filter-btn {
        background: #27ae60;
        color: white;
        border: none;
        padding: 8px 15px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: bold;
    }

    .filter-btn:hover {
        background: #219150;
    }

    /* Product Grid */
    .products-section {
        flex: 1;
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
<div class="container">
    <!-- Sidebar Filter -->
        <div class="sidebar sticky-top" style="top: 130px;">
        <h3 class="filter-title">Sort By</h3>
        <form action="{{ route('product.search') }}" method="GET">
            <div class="filter-group">
                <select name="sort" id="sort" class="form-control">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="best-rating" {{ request('sort') == 'best-rating' ? 'selected' : '' }}>Best Rating</option>
                </select>
            </div>
            <button class="filter-btn" type="submit">Apply</button>
        </form>
    </div>


    <!-- Products Section -->
    <section class="products-section">
        <div class="grid">
            @foreach ($products as $product)
            <div class="card">
                <img src="{{ $product->imgUrl }}" alt="{{ $product->title }}" class="card-img">
                <div class="card-body">
                    <h3>{{ Str::limit($product->title, 40) }}</h3>
                    <p class="product-meta">
                        <span class="price">${{ number_format($product->price, 2) }}</span>
                        <span class="rating">⭐{{ $product->stars }}</span>
                    </p>
                </div>
            </div>
            @endforeach
            <!-- Pagination -->
        </div>
    </section>
    
</div>
<!-- Pagination -->
<div class="d-flex justify-content-center mt-5 fs-5">
    {{ $products->appends(request()->query())->links() }}    
</div>

     @endsection

@section('scripts')

@endsection
