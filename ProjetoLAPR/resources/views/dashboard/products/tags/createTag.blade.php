@extends('layouts.dashLayout')

@section('title')
    Dashboard | Create Product
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Tags Menu</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-4 col-md-offset-4">
                    <div class="mb-3">
                        <table class="table table-striped">
                            <th>ID's</th>
                            <th>Existent Tags</th>
                            <caption>List of Tags</caption>
                        @foreach($tags as $tag)
                                <tr class="align-left">
                                    <td>{{$tag['id']}}</td>
                                    <td>{{$tag['name']}}</td>
                                </tr>
                        @endforeach
                        </table>
                    </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('storeTag')}}' enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('New Tag') }}</label>

                    <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" autocomplete="tag">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mt">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Create Tag') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('deleteTag')}}' enctype="multipart/form-data">
                    @csrf
                    <label for="tag" class="col-md-4 col-form-label text-md-right">{{ __('Delete Tag') }}</label>

                    <div class="mb-3">
                        <input id="tag" type="text" class="form-control @error('tag') is-invalid @enderror"
                               name="tag" value="{{ old('tag') }}"  autocomplete="tag">

                        @error('tag')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mt">
                        <button type="submit" class="btn btn-secondary">
                            {{ __('Delete Tag') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
