@extends('layouts.dashLayout')

@section('title')
    Dashboard | Show {{$product->name}}
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')
    <div class="row align-items-center justify-content-center mb-3" style="margin-top:45px">
        <div class="col-sm-4 text-start border-bottom">
            <h2 class="mx-auto">Details from {{ucfirst($product->name)}}</h2>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Product image</label>
            </div>
            <div class="col-sm-2 text-start">
                <img src="{{$product->image}}" style="width: 158px;height: 208px;"  alt="{{$product->name}}">
            </div>
        </div>
    </div>
    <div class="container " style="margin-top: 5rem;">
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Id</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->id}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Name</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{ucfirst($product->name)}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Price</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->price}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Family</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->family}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Type</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->type}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Stock</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->stock}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Brand</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->brand}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Color</label>
                </div>
                <div class="col-sm-2 text-start border-bottom" style="background-color: {{$product->color}};">
                    {{$product->color}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Created At</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->created_at}}
                </div>
            </div>
        </div>
        <div class="container mb-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-2 text-start border-bottom">
                    <label for="Username">Product Last data Update</label>
                </div>
                <div class="col-sm-2 text-start border-bottom">
                    {{$product->updated_at}}
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start ">
                <label for="Username">Product Description</label>
            </div>
            <div class="col-sm-2 text-start ">
                {{$product->description}}
            </div>
        </div>
    </div>
@endsection

