@extends('layouts.dashLayout')

@section('title')
    Dashboard | Email {{$user->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

@endsection
