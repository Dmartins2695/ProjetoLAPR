@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-8 col-md-offset-4">
                <div class="container mb-4"><h2>{{ __('Reset Password') }}</h2></div>
                @if (session('status'))
                    <div class="container">
                        <div class="col-md-6 alert alert-success" style="margin:0;padding:10px;" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="container mb-1">
                        <label for="email"
                               class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6 mb-2">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="container">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
