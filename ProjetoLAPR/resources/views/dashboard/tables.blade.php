@extends('layouts.app')

@section('title')
    Dashboard | {{$tableName}}
@endsection

@section('content')
    <div class="container">
        <table>
            @switch($tableName)
                @case('users')
                @foreach($users as $user)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['email_verified_at']}}</td>
                        <td>{{$user['created_at']}}</td>
                        <td>{{$user['created_at']}}</td>
                    </tr>
                @endforeach
                @break
                @case('products')
                @foreach($products as $product)
                    <tr>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['price']}}</td>
                    </tr>
                @endforeach
                @break
                @default
                <h2>No records to display in table: {{$tableName}}</h2>
            @endswitch()

        </table>
    </div>
@endsection
