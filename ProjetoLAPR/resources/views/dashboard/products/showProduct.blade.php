@extends('layouts.dashLayout')

@section('title')
    Dashboard | Show {{$product->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    @include('includes._productDetails')
@endsection

