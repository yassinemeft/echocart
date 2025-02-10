@extends('layouts.app')

@section('title', 'View Product')

@section('styles')
<style>
    
    /* Container */
    .container {
        max-width: 1350px;
        margin: auto;
        padding: 10px;
        gap: 20px;
    }

    /* Product Container */
    .product-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        max-width: 1200px;
        margin: 20px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
    }
    .product-image {
        flex: 1;
        text-align: center;
    }
    .product-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .product-details {
        flex: 2;
        padding: 20px;
    }
    .product-details h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #343a40;
    }
    .product-details p {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: #6c757d;
    }
    .product-actions {
        display: flex;
        gap: 10px;
    }
    .product-actions input[type="number"] {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        width: 100px;
        text-align: center;
    }
    .product-actions button {
        padding: 10px 20px;
        border: none;
        justify-content: space-between;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .btn-buy {
        background-color: #343a40;
        color: #fff;
    }
    .btn-see {
        background-color:rgb(225, 237, 0);
        color: #fff;
    }
    .btn-buy:hover {
        background-color: #495057;
        color: black;
    }
    .btn-secondary {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        color: #495057;
    }
    .btn-secondary:hover {
        background-color: rgb(150, 167, 185);
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

    h2 {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
    text-transform: uppercase;
    border-bottom: 3px solid rgb(78, 78, 78);
    display: inline-block;
    padding-bottom: 5px;
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
<div class="product-container">
    <div class="product-image">
        <a href="#">
            <img src="{{ $product->imgUrl }}" alt="{{ $product->title }}">
        </a>
    </div>
    <div class="product-details">
        <h1>{{ $product->title }}</h1>
        <div class="d-flex justify-content-evenly my-3">
            <p class="fs-4"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p class="rating fs-4">⭐ {{ $product->stars }}</p>
        </div>
        <div class="product-actions d-flex align-items-center justify-content-between">
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="asin" value="{{ $product->asin }}">
                <input type="hidden" name="title" value="{{ $product->title }}">
                <input type="hidden" name="price" value="{{ $product->price }}">
                <div class="mb-2">
                    <label for="quantity" class="form-label">Quantity :</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
            </form>
            <button class="btn-buy w-100">Buy</button>
            <a href="{{ $product->productURL }}">
                <button class="btn-see w-100">See in Amazon</button>
            </a>
        </div>
    </div>
</div>


    <section class="related-products my-5">
    <h2>Related Products</h2>
        <div class="grid">
        @foreach ($relatedProducts as $related)
            <div class="card">
                    <a href="{{ route('products.show', $related->id) }}" style="text-decoration: none;">
                    <img src="{{ $related->imgUrl }}" alt="{{ $related->title }}" class="card-img">
                    <div class="card-body">
                        <h3>{{ Str::limit($related->title, 40) }}</h3>
                        <p class="product-meta">
                            <span class="price">${{ number_format($related->price, 2) }}</span>
                            <span class="rating">⭐{{ $related->stars }}</span>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>


    <section class="related-products my-5">
    <h2>You might also like</h2>
        <div class="grid">
        @foreach ($randomProducts as $random)
            <div class="card">
                    <a href="{{ route('products.show', $random->id) }}" style="text-decoration: none;">
                    <img src="{{ $random->imgUrl }}" alt="{{ $random->title }}" class="card-img">
                    <div class="card-body">
                        <h3>{{ Str::limit($related->title, 40) }}</h3>
                        <p class="product-meta">
                            <span class="price">${{ number_format($random->price, 2) }}</span>
                            <span class="rating">⭐{{ $random->stars }}</span>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="customer-reviews my-5" style="margin: 0 ;">
    <h2>Customer Reviews</h2>
    <div class="d-flex flex-wrap" data-masonry='{"percentPosition": true }'>
        @foreach ($reviews as $review)
        <div class="card review" style="width: 250px; padding: 15px; margin: 5px; font-size: 0.75rem;">
            <p style="text-align: left; margin-bottom: 5px; font-weight: bold;">
                {{ $review->reviewerName }} - ⭐ {{ $review->overall }}
            </p>
            <p style="margin: 0; text-align: left;">{{ $review->reviewText }}</p>
            <p style="font-size: 0.7rem; color: #6c757d; margin-top: 10px; display: flex; align-items: center;">
                📅 <span style="margin-left: 5px;">Posted on {{ date('F j, Y', strtotime($review->reviewTime)) }}</span>
            </p>
        </div>
        @endforeach
    </div>
</section>


</div>
@endsection

@section('scripts')

<script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"></script>

@endsection
