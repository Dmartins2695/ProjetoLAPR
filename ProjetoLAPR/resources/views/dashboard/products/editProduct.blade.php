@extends('layouts.dashLayout')

@section('title')
    Dashboard | Update Product
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Update {{$product->name}}</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('updateProduct',$product->id)}}'enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                    <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $product->name }}" required autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock Available') }}</label>

                    <div class="mb-3">
                        <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror"
                               name="stock" value="{{ $product->stock }}" autocomplete="stock">

                        @error('stock')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>

                    <div class="mb-3">
                        <input id="price" type="number" min="0.00" step="0.01" class="form-control @error('price') is-invalid @enderror"
                               name="price" value="{{ $product->price }}" placeholder="{{ $product->price }}" required autocomplete="price">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Product Type') }}</label>

                    <div class="mb-3">
                        <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                               name="type" value="{{ $product->type }}" required autocomplete="type">

                        @error('type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Product Brand') }}</label>

                    <div class="mb-3">
                        <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror"
                               name="brand" value="{{ $product->brand }}" required autocomplete="brand">

                        @error('brand')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Product Color') }}</label>

                    <div class=" col-md-2 mb-3">
                        <input id="color" type="color" class="form-control @error('color') is-invalid @enderror"
                               name="color" value="{{ $product->color }}" autocomplete="color" style="height: 20px;width: 60px;padding: 0.21rem;">

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="description" class="col-md-8 col-form-label text-md-right">{{ __('Product Description') }}</label>

                    <div class="mb-3">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                  name="description" required autocomplete="description">{{ $product->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                    <div class="mb-3">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                               name="image" value="{{ old('image') }}" autocomplete="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mt">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Product') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
