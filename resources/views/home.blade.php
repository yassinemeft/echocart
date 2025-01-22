@extends('layouts.app')

@section('title', 'Home')


@section('content')

    <!-- Hero Section -->
    <div id="intro-example" class="p-5 text-center bg-image vh-100 mx-auto" 
    style="background-image: url('/images/hero.jpg'); background-size: cover; background-position: center;">
    <div class="mask" style="height: 100%;">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-dark">
          <h1 class="display-3 mb-3">Welcome to EchoCart</h1>
          <h4 class="mb-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
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
     


@endsection