@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    @include('includes._wraperBarFilters')
    @include('includes._carousel')
    <main role="main">
        @include('includes.showProducts')
    </main>
@endsection

@section('footer')
    @include('includes._footer')
@endsection
