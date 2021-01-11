@extends('layouts.dashLayout')

@section('title')
    Dashboard | Show {{$user->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    <div class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">{{ucfirst($user->name)}} Details</h4>
        <div class="py-2">
            <form method="POST" action="/dashboard/tables/users/update/{{$user['id']}}">
                @csrf
                <div class="row py-2">
                    <div class="col-md-6"><label for="name">User Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" placeholder="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3"><label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" placeholder="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="align-items-end py-3 border-bottom">
                    <button type="submit" class="btn btn-primary btn-sm mr-3">Save Changes</button>
                </div>
            </form>
            <div class="row py-2">
                <div class="col-md-6"><label for="userId">User Id</label>
                    <input type="text"
                           class="bg-light form-control"
                           placeholder="{{$user->id}}" disabled>
                </div>
                <div class="col-md-6 pt-md-0 pt-3"><label for="emailVerified">Email Verification</label> <input
                        type="text" class="bg-light form-control" disabled placeholder="{{$user->email_verified_at}}">
                </div>
            </div>


            <div class="row py-2 ">
                <div class="col-md-6"><label for="email">Account Created</label>
                    <input type="text"
                           class="bg-light form-control"
                           disabled
                           placeholder="{{$user->created_at}}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3"><label for="phone">Last Updated</label>
                    <input type="text"
                           class="bg-light form-control"
                           disabled
                           placeholder="{{$user->updated_at}}">
                </div>
            </div>

            <div class="row py-2 pb-4 border-bottom">
                <div class="col-md-12">
                    <label for="userRoles">User Roles</label>
                    <div class="col-sm-6 form-control border" style="background-color: #f8f9fa; font-weight: 500; color:#6c757d;">
                        @foreach($roles as $role)
                            {{$role->name.", "}}
                        @endforeach
                    </div>
                </div>
            </div>

            <form action="/dashboard/tables/users/delete/{{$user['id']}}" method="post">
                @csrf
                <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div>
                        <b>Delete User Account</b>
                    </div>

                    <div class="mx-auto">
                        <button class="btn danger">Deactivate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            background-color: white
        }

        .wrapper {
            padding: 30px 50px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 10px auto;
            max-width: 600px
        }

        h4 {
            letter-spacing: -1px;
            font-weight: 400
        }

        #img-section p,
        #deactivate p {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
            text-align: justify
        }

        #img-section b,
        #img-section button,
        #deactivate b {
            font-size: 14px
        }

        label {
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            color: #777;
            padding-left: 3px
        }

        .form-control {
            border-radius: 10px
        }

        input[placeholder] {
            font-weight: 500
        }

        input[value] {
            font-weight: 500
        }

        .form-control:focus {
            box-shadow: none;
            border: 1.5px solid #0779e4
        }

        select {
            display: block;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            height: 40px;
            padding: 5px 10px
        }

        select:focus {
            outline: none
        }

        .btn-primary {
            background-color: #0779e4
        }

        .danger {
            background-color: #fff;
            color: #e20404;
            border: 1px solid #ddd
        }

        .danger:hover {
            background-color: #e20404;
            color: #fff
        }

        @media (max-width: 576px) {
            .wrapper {
                padding: 25px 20px
            }

            #deactivate {
                line-height: 18px
            }
        }
    </style>
@endsection
