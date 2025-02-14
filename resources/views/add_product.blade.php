@extends('layouts.app')

@section('title', 'Add Product')

@section('styles')
<head>
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Body background color */
        body {
            background-color: #f8f9fa;
        }
        /* Container styling */
        .container-lg {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Product image styling */
        .product-image {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .product-image img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }
        /* Button styling */
        .btn-primary {
            background-color: #343a40;
            color: white;
            font-weight: bold;
            border: none; /* Remove border */
        }
        .btn-primary:hover {
            background-color: #495057;
            color: white;
            border: none; /* Ensure no border on hover */
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3e8e41;
            border-color: #d6e9c6;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
    </style>
</head>
@endsection

@section('content')
    <div class="container-lg">

    @if (session('success'))
        <div class="alert-success my-5">
            {{ session('success') }}
        </div>
    @endif


        <h2 class="text-center">Add a Product</h2>
        <div class="product-image">
            <img  id="preview">
        </div>
        <!-- Product form -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Laravel's CSRF protection -->
            <!-- Product Image Input -->
            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" class="form-control" name="product_image" id="imageInput" accept="image/*" required>
            </div>
            <!-- Product Name Input -->
            <div class="mb-3">
                <label class="form-label">Product Descriptive Name</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <!-- Product Stars Input -->
            <div class="mb-3">
                <label class="form-label">Stars</label>
                <input type="number" class="form-control" name="stars" step="1" min="0" max="5" required>
            </div>
            <!-- Product Price Input -->
            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" class="form-control" name="price" step="0.01" required>
            </div>
            <!-- Product Category Select -->
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Add Product</button>
        </form>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
