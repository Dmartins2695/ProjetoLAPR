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
    <main role="main">
        @include('includes.showProducts')
    </main>
@endsection

@section('footer')
    <footer class="text-muted">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col col-sm-2 align-self-end">
                    <a href="#"><button class="btn btn-md btn-secondary">Back to top   </button> </a>
                </div>
            </div>
        </div>
    </footer>
@endsection
