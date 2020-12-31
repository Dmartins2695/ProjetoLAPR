@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-around">
                <a class="p-2 text-muted" href="#">Strings</a>
                <a class="p-2 text-muted" href="#">Keys</a>
                <a class="p-2 text-muted" href="#">Drums</a>
            </nav>
        </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="height: 30vw;">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('carrousel/carrousel1.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{asset('carrousel/carrousel2.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{asset('carrousel/carrousel3.jpg')}}" class="d-block w-100" alt="..." style="height: 30vw;object-fit: cover;">
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

    <main role="main">
        @include('includes.showProducts')
    </main>
@endsection

@section('footer')
    <footer class="text-muted">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col col-sm-2 align-self-end">
                    <a href="#">
                        <button class="btn btn-md btn-secondary">Back to top</button>
                    </a>
                </div>
            </div>
        </div>
    </footer>
@endsection
