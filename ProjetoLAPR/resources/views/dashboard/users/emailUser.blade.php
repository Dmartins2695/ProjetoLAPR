@extends('layouts.dashLayout')

@section('title')
    Dashboard | Email {{$user->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row">
            <form action="">
                @csrf
                <div class="col">
                    <input type="text">
                </div>
                <div class="col">
                    <input type="text">
                </div>
                <div class="col">
                    <input type="text">
                </div>
            </form>
        </div>
    </div>

@endsection
