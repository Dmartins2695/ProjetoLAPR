@extends('layouts.app')

@section('title')
    Dashboard | {{ucfirst($tableName)}}
@endsection

@section('content')
    @include('includes._dashboardBar')
    <div class="container">
        <table class="table table-striped table-hover">
            @switch($tableName)
                @case('subscribed Users')
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Created</th>
                <th>Updated</th>
                <caption>List of Subscribed Users</caption>
                @foreach($pUsers as $pUser)
                    @foreach($users as $user)
                        @if($pUser->name===$user->name)
                            <tr>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['email_verified_at']}}</td>
                                <td>{{$user['created_at']}}</td>
                                <td>{{$user['updated_at']}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                {!! $pUsers->links('pagination::bootstrap-4')!!}
                @break
                @case('users')
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Created</th>
                <th>Updated</th>
                <caption>List of Users</caption>
                @foreach($pUsers as $pUser)
                    @foreach($users as $user)
                        @if($pUser->name===$user->name)
                            <tr>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['email_verified_at']}}</td>
                                <td>{{$user['created_at']}}</td>
                                <td>{{$user['created_at']}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
{{--                {!! $pUsers->links('pagination::bootstrap-4')!!}--}}
                @break
                @case('products')
                <th>Product id</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Family</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Last Buy</th>
                <caption>List of Products</caption>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['stock']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['family']}}</td>
                        <td>{{$product['type']}}</td>
                        <td>{{$product['brand']}}</td>
                        <td>{{$product['updated_at']}}</td>
                    </tr>
                @endforeach
                {!! $products->links('pagination::bootstrap-4')!!}
                @break
                @default
                <h2>No records to display in table: {{$tableName}}</h2>
            @endswitch()

        </table>
    </div>
@endsection
