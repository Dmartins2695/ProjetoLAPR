@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="container sm carousel slide" style="width:70%;" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{--{{URL('/ProductsPhotos/carrousel1.jpg')}}--}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{--{{URL('/ProductsPhotos/carrousel2.jpg')}}--}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{--{{URL('/ProductsPhotos/carrousel3.jpg')}}--}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
@endsection
