@extends('layouts.app')

@section('title')
    Dashboard | {{ucfirst($tableName)}}
@endsection

@section('content')
    @include('includes.dashboard._dashboardBar')
    <div {{$tableName==='products'?'class=row':"class=container"}}>
        @if($tableName==='products')
        <div class="btn-group-vertical col-sm-1 align-self-start" style="width: 19.8rem;">
            <div class="container mb-2">
                <form action="{{route('createProduct')}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        Create new Product
                    </button>
                </form>
            </div>
            <div class="container mb-2">
                <form action="{{route('productsPdf')}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        Download Stock PDF
                    </button>
                </form>
            </div>
        </div>
        @endif
        <div {{$tableName==='products'?"class=col-md-10 style=width:82rem":"class=container"}}>
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
    </div>
@endsection
