@extends('layouts.dashLayout')

@section('title')
    Dashboard | Show Order number: {{$order->id}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    @include('includes._orderDetails')
@endsection
