@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    @include('includes._wraperBarFilters')
    <main role="main">
       @include('includes._productDetails')
    </main>
@endsection

@section('footer')
    @include('includes._footer')
@endsection

