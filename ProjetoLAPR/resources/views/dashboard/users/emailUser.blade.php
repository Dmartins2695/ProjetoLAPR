@extends('layouts.dashLayout')

@section('title')
    Dashboard | Email {{$user->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Send Email to {{$user->name}}</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action="/dashboard/tables/users/sendEmail/{{$user['id']}}">
                    @csrf
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Title') }}</label>

                    <div class="mb">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="body" class="col-md-8 col-form-label text-md-right">{{ __('E-Mail Body') }}</label>

                    <div class="mb-3">
                        <textarea id="body" class="form-control @error('body') is-invalid @enderror"
                                  name="body" required autocomplete="description">{{ old('body') }}</textarea>

                        @error('body')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mt">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Email to ').$user->name }}
                        </button>
                    </div>
                </form>
                @if(session('message'))
                    <p class="text-success text-xs mt-2">{{session('message')}}</p>
                @endif
            </div>
        </div>
    </div>

@endsection
