@extends('layouts.app')

@section('title')
    Dashboard | {{ucfirst($tableName)}}
@endsection

@section('content')
    @include('includes.dashboard._dashboardBar')
    <div class="container">
        <table class="table table-striped table-hover">
            @switch($tableName)
                @case('subscribed Users')
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Created</th>
                <th>|</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <caption>List of Subscribed Users</caption>
                    @foreach($users as $user)
                            <tr class="align-middle">
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['email_verified_at']}}</td>
                                <td>{{$user['created_at']}}</td>
                                @include('includes.dashboard._dashboardUserTableButtons')
                            </tr>
                    @endforeach
                {!! $users->onEachSide(2)->links('pagination::bootstrap-4')!!}
                @break
                @case('users')
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Created</th>
                <th>|</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <caption>List of Users</caption>
                    @foreach($users as $user)
                            <tr class="align-middle">
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['email_verified_at']}}</td>
                                <td>{{$user['created_at']}}</td>
                                @include('includes.dashboard._dashboardUserTableButtons')
                            </tr>
                    @endforeach
                {!! $users->onEachSide(2)->links('pagination::bootstrap-4')!!}
                @break
                @case('products')
            <div class="row">
                <div class="col-sm-3 container mb-3">
                    <form action="{{route('createProduct')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Create new Product</button>
                    </form>
                </div>
                <div class="col-sm-3 container mb-3">
                    <form action="{{route('productsPdf')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-secondary" >Download Stock List PDF</button>
                    </form>
                </div>
            </div>
                <th>Product id</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Brand</th>
                <th>|</th>
                <th></th>
                <th></th>
                <th></th>
                <caption>List of Products</caption>
                @foreach($products as $product)
                    <tr class="align-middle">
                        <td>{{$product['id']}}</td>
                        {{--                        <td>{{$product['image']}}</td>--}}
                        <td>{{$product['name']}}</td>
                        <td>{{$product['stock']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['brand']}}</td>
                        @include('includes.dashboard._dashboardProductsTableButtons')
                    </tr>
                @endforeach
                {!! $products->links('pagination::bootstrap-4')!!}
                @break
                @default
                <h2>No records to display!</h2>
            @endswitch()

        </table>
    </div>
@endsection
