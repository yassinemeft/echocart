@extends('layouts.app')

@section('title', 'Home')

@section('styles')
<style>
    .typing::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 2px;
    height: 100%;
    background: transparent;
    animation: cursorBlink 0.8s steps(3) infinite;
}

@keyframes cursorBlink {

    0%,
    75% {
        opacity: 1;
    }

    76%,
    100% {
        opacity: 0;
    }
}

.typing {
    position: relative;
    
}

.typing h2 {
    position: relative;
    color:hsl(195, 4.90%, 32.20%);
    letter-spacing: 5px;
    font-size: 4rem;
    overflow: hidden;
    margin-bottom: 0;
    animation: type 5s steps(11) infinite;
}

@keyframes type {

    0%,
    100% {
        width: 0px;
    }

    30%,
    60% {
        width: 394.09px;
    }
}

@media(max-width: 330px) {
    .typing h2 {
        font-size: 3rem;
        animation: type 5s steps(10) infinite;
    }

    @keyframes type {

        0%,
        100% {
            width: 0px;
        }

        30%,
        60% {
            width: 305px;
        }
    }
}
</style>
@endsection

@section('content')

    <!-- Hero Section -->
    <div id="intro-example" class="p-5 text-center bg-image vh-100 mx-auto" 
         style="background-image: url('{{ asset('images/hero.jpg') }}'); background-size: cover; background-position: center;">
        <div class="mask" style="height: 100%;">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-dark">
          <h1 class="display-3 mb-3">Welcome to EchoCart</h1>
          <h4 class="mb-4">
            Lorem ipsum dolor amet consectetur adipisicing elit. Quisquam, quod.
          </h4>
          <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A"
            role="button" rel="nofollow" target="_blank">Explore our Products</a>
          <a data-mdb-ripple-init class="btn btn-outline-dark btn-lg m-2" href="https://mdbootstrap.com/docs/standard/"
            target="_blank" role="button">Learn more</a>
        </div>
      </div>
    </div>
  </div>
     <!--Hero Section Ends-->

     <!--Second Section-->
    <div class="d-flex p-5 mb-4 bg-light rounded-3">
        <div class="py-5">
            <div class="typing mb-4">
                <h2 class="display-5 fw-bold">Custom jumbotron</h2>
            </div>
                <p class="col-md-8 fs-4">
                Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap.
                Check out the examples below for how you can remix and restyle it to your liking.
            </p>
            
            <button class="btn btn-primary btn-lg" type="button">Example button</button>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex p-5 mb-4 bg-light rounded-3">
    <div class="py-5">
    <div class="typing mb-4">
                <h2 class="display-5 fw-bold">Custom jumbotron</h2>
            </div>
        <p class="col-md-8 fs-4">
            Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.
        </p>
        <button class="btn btn-primary btn-lg" type="button">Example button</button>
    </div>
    <div>
        <div class="row row-cols-md-2 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <img src="{{ $product->imgUrl }}" class="card-img-top img-fluid h-100" alt="Product Image" style="object-fit: cover; h">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




@endsection