@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    @include('includes._wraperBarFilters')
    <main role="main">
        <div class="container mb-5">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="align-middle text-center">
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Stock Available</th>
                            <th>Product Quantity</th>
                            <th>Delete</th>
                            <th>Product Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($cart))
                        @foreach($cart as $product)
                            <tr class="align-middle text-center">
                                <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" style="width: 50px;height: 70px;"></td>
                                <td>{{ucfirst($product->name)}}</td>
                                <td>{{$product->stock}}</td>
                                <td style="width: 18%;">
                                    <form action="{{route('updateItem',$product->rowId)}}">
                                        <div class="row justify-content-center align-items-center" >
                                            <div class="col col-sm-2 " style="width: 38%;">
                                                <input class="form-control auto" name='qty' type="number" value="{{$product->qty}}">
                                            </div>
                                            <div class="col col-sm-1 ">
                                                <button class="btn btn-outline-secondary btn-sm align-center" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td><a href="{{route('deleteItem',$product->rowId)}}">
                                        <button class="btn btn-sm btn-outline-danger" style="border:unset;">X</button>
                                    </a>
                                </td>
                                <td>{{$product->price}}</td>
                            </tr>
                        @endforeach
                    @else
                            <h1 class="text-danger">No products in your Cart! Please add Products to the Cart!<h1>
                    @endif
                    </tbody>
                    <tr class="align-middle text-center">
                        <td colspan="4">&nbsp;</td>
                        <td>Total Price: </td>
                        <td>{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                    </tr>
                </table>
                <div class="row justify-content-end align-items-center">
                    <div class="col col-sm-2">
                        <a href="{{route('checkout')}}"><button class="btn btn-success">Proceed to Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

