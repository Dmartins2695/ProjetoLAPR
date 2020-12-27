@extends('layouts.dashLayout')

@section('title')
    Allegro | Dashboard
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    <div class="container " style="margin-top: 5rem;">
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Id</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->id}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Name</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->name}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Email</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->email}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Email Verified</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->email_verified_at}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Account Created</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->created_at}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Last data Update</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$user->updated_at}}
                </div>
            </div>
        </div>
    </div>
@endsection
