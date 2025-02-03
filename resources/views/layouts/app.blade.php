<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EchoCart')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        /* Style général du footer */
        footer {
            background-color: #343a40; /* Fond sombre */
            color: white;
            padding: 20px 0;
        }

        /* Fixer les titres */
        footer h5 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        /* Liens et icônes */
        footer a, footer i {
            font-size: 20px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
            display: inline-block;
        }

        /* Quick Links Hover */
        footer .list-unstyled li a:hover {
            color:rgb(0, 0, 0); /* Orange */
            padding-left: 5px;
        }

        /* Quick Links en orange après hover */
        footer .list-unstyled li a:hover {
            color:rgb(0, 0, 0) !important;
        }

        /* Hover sur la classe "text-white me-3" */
        footer .text-white.me-3 i:hover {
            color:rgb(0, 0, 0); /* Orange */
            padding-left: 5px;
        }

        /* Désactiver hover sur "About EchoCart" */
        footer p {
            transition: none;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color:rgba(137, 137, 137, 0.85);">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a class="navbar-brand mx-5" href="{{ url('/') }}">
                <img src="{{ asset('images/echo_logo.png') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                EchoCart
            </a>

            <!-- Search Form -->
            <form action="{{ route('product.search') }}" method="GET" class="d-flex" role="search" style="width: 45%;">
                <input class="form-control ms-5 rounded-pill" name="query" type="search" placeholder="Type something..." aria-label="Search" value="{{ request('query') }}">
                <button class="btn btn-outline-light rounded-pill ms-2" type="submit">Search</button>
            </form>

            <!-- Toggler for Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.search') }}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Category 1</a></li>
                            <li><a class="dropdown-item" href="#">Category 2</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Another Category</a></li>
                        </ul>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar Ends -->

    <!-- Main Content Section -->

        @yield('content')
    
    <!-- Main Content Section Ends -->
     

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About EchoCart</h5>
                    <p>EchoCart offers a seamless shopping experience with top-quality products at unbeatable prices.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Products</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section Ends -->

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


    <!-- Custom Scripts -->
    @yield('scripts')

</body>
</html>
