@extends('layouts.dashLayout')

@section('title')
    Allegro | Dashboard
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    <div class="container ">
        {{$user->name}}
    </div>
@endsection
