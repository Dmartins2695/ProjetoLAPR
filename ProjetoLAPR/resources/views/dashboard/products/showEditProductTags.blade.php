@extends('layouts.dashLayout')

@section('title')
    Dashboard | Update Product Tags
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Update {{$product->name}} Tags</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('editProductTags',$product->id)}}' enctype="multipart/form-data">
                    @csrf
                    <label for="family" class="col-md-4 col-form-label text-md-right">{{ __('Product Tags') }}</label>

                    <div class="mb-3">
                        <select id="tags" class="col-sm-4 custom-select @error('tags') is-invalid @enderror" multiple
                                name="tags[]" required autocomplete="tags">
                            @foreach($tags as $tag)
                                <option value="{{$tag->name}}" >{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
