@extends('layouts.app')

@section('title')
    Allegro | Settings
@endsection

@section('content')
    @include('includes._settingMenu')
    {{--    @include('user.info.userInfo')--}}
    <div class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">Account settings</h4>

        <div class="py-2">
            <form method="POST" action="{{ route('infoStore', $user->id) }}">
                @csrf
                <div class="row py-2">
                    <div class="col-md-6">
                        <label for="name">First Name</label>
                        <div class="mb">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="py-3 pb-4 border-bottom">
                    <button class="btn btn-primary mr-3">Save Changes</button>
                </div>
            </form>

            <h6 class="py-4 border-bottom">Change Password</h6>
            <div>
                <form method="POST" action="{{ route('infoResetPassword', $user->id) }}">
                    @csrf
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="passCur">Current Password</label>
                            <input id="passCur" type="password" placeholder="Current Password"
                                   class="form-control @error('passCur') is-invalid @enderror" name="passCur" required
                                   autocomplete="new-password">

                            @error('passCur')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="password">New Password</label>
                            <input id="password" type="password" placeholder="New Password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <label for="passNew2">Confirm New Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm New Password"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button class="btn btn-primary mr-3">Change Password</button>
                    </div>
                </form>
            </div>

            <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                <div>
                    <b>Deactivate your account</b>
                    <p>Pressing this button will delete your account forever,<br>
                        It will be impossible to recover your account,<br>
                        This action will not be blamed on the site,<br>
                        So please make sure that's really the action you want to do.<br>
                    </p>
                </div>
                <div class="mx-auto">
                    <a href="{{route('accountDelete',$user->id)}}">
                        <button class="btn danger">Deactivate</button>
                    </a>
                </div>
            </div>
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

        .img {
            width: 70px;
            height: 70px;
            border-radius: 6px;
            object-fit: cover
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

        .button {
            background-color: #fff;
            color: #0779e4
        }

        .button:hover {
            background-color: #0779e4;
            color: #fff
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

