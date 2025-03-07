@extends('layouts.dashLayout')

@section('title')
    Dashboard | Create Product
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Create New Product</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('storeProduct')}}' enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                    <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock Available') }}</label>

                    <div class="mb-3">
                        <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror"
                               name="stock" value="{{ old('stock') }}" autocomplete="stock">

                        @error('stock')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                    <div class="mb-3">
                        <input id="price" type="number" min="0.00" step="0.01" class="form-control @error('price') is-invalid @enderror"
                               name="price" value="{{ old('price') }}" required autocomplete="price">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

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

                    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Product Brand') }}</label>

                    <div class="mb-3">
                        <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror"
                               name="brand" value="{{ old('brand') }}" required autocomplete="brand">

                        @error('brand')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Product Color') }}</label>

                    <div class=" col-md-2 mb-3">
                        <input id="color" type="color" class="form-control @error('color') is-invalid @enderror"
                               name="color" value="{{ old('color') }}" autocomplete="color" style="height: 20px;width: 60px;padding: 0.21rem;">

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="description" class="col-md-8 col-form-label text-md-right">{{ __('Product Description') }}</label>

                    <div class="mb-3">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                  name="description" required autocomplete="description">{{ old('description') }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                    <div class="mb-3">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                               name="image" value="{{ old('image') }}" required autocomplete="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mt">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create Product') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
