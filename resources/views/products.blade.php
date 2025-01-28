@extends('layouts.app')

@section('title', 'Product Collection')

<!-- Custom styles -->
@section('styles')
<style>
        /* Reset global styles */
        body {
            background: #f8f9fa;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container styles */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        /* Page title styles */
        .text-center {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        /* Grid layout for products */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); 
            gap: 15px; /* Réduction de l'espace entre les cartes */
        }

        /* Card styles */
        .card {
            background: rgba(131, 106, 106, 0.62);
            border-radius: 10px;
            border: 0px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        /* Hover effect for cards */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Image styles */
        .card-img {
            width: 100%;
            height: 150px; /* Réduction de la hauteur des images */
            object-fit: cover;
        }

        /* Card content styles */
        .card-body {
            padding: 10px; /* Moins d'espace dans le contenu */
        }

        .card-body h3 {
            font-size: 1rem; /* Réduction de la taille du texte */
            margin-bottom: 8px;
            font-weight: bold;
            color: #343a40;
        }

        .card-body p {
            color: rgb(0, 0, 0);
            margin-bottom: 10px;
        }

        

        /* Make entire card a link */
        .card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
@endsection

@section('content')
    <!-- Main container -->
    <div class="container">
        <!-- Page title -->
        <h1 class="text-center" style="font-weight: bold;">Explore Our Collection</h1>

        <!-- Grid layout for products -->
        <div class="grid">
            @php
            // Liste des produits statiques
            $products = [
                ["title" => "T-shirt", "price" => "50 DH"],
                ["title" => "Mug", "price" => "20 DH"],
                ["title" => "Phone Case", "price" => "10 DH"],
                ["title" => "Poster", "price" => "30 DH"],
                ["title" => "Hoodie", "price" => "80 DH"],
                ["title" => "Notebook", "price" => "15 DH"],
                ["title" => "Socks", "price" => "25 DH"],
                ["title" => "Stickers", "price" => "5 DH"],
                ["title" => "Pillow", "price" => "35 DH"],
            ];
            @endphp

            <!-- Product cards -->
            @foreach ($products as $product) 
                <a href="#" class="card-link">
                    <div class="card">
                        <!-- Product image -->
                        <img src="/images/t-shirt.jpg" alt="{{ $product['title'] }}" class="card-img">
                        <!-- Product details -->
                        <div class="card-body">
                           <h3>{{   $product['title'] }} - {{   $product['price']   }}</h3>
                             
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

