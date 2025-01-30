@extends('layouts.app')

@section('title', 'View Products')

@section('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }
    .product-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        max-width: 1200px;
        margin: 50px auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
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
        font-size: 2rem;
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
        flex-direction: column;
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
</style>
@endsection

@section('content')
<body>
    <div class="product-container">
        <div class="product-image">
            <a href="#">
                <img src="/images/t-shirt.jpg" alt="Product Test Image">
            </a>
        </div>
        <div class="product-details">
            <h1 style="font-weight: bold;">Produit Test</h1>
            <p><strong>Price:</strong> 99.99€</p>
            <p><strong>Description:</strong> Ceci est un produit de test avec une image d'exemple.</p>
            <div class="product-actions">
                <label for="quantity">Entrez la quantité souhaitée</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <button class="btn-buy">Achetez maintenant</button>
                <button class="btn-secondary">Ajouter au panier</button>
                <button class="btn-secondary">Ajouter aux favoris</button>
            </div>
        </div>
    </div>
</body>
@endsection
