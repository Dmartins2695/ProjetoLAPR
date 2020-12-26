@extends('layouts.dashLayout')

@section('title')
    Allegro | Dashboard
@endsection

@section('content')
    <div class="container">
            <div class="row">
                <div class="col">
                    <li><a href="{{url("/dashboard/tables/users")}}">Users</a></li>
                </div>
                <div class="col">
                    <li><a href="{{url("/dashboard/tables/products")}}">Products</a></li>
                </div>
                <div class="col">
                    <li><a href="{{url("/dashboard/tables/subs")}}">Subscribed Users</a></li>
                </div>
            </div>
    </div>
@endsection
