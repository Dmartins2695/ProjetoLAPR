@extends('layouts.app')

@section('title')
    Allegro | Settings 
@endsection

@section('content')

    @include('includes._settingMenu')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Update Info</h2>
            </div>
            <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action="{{ route('infoStore', $user->id) }}">
                    @csrf

                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="mb">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="mb">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="mb">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="password-confirm"
                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class=" mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">
                    </div>
                    <div class="mt">
                        <button type="submit" class="btn btn-primary">
                            {{ __('edit') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection