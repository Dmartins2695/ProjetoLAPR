@extends('layouts.dashLayout')

@section('title')
    Allegro | Dashboard
@endsection

@section('content')
    <div class="container">
            <div class="row">
                @foreach($tables as $table)
                    @if(strcmp('users',$table)==0 or strcmp('products',$table)==0)
                <div class="col">
                    <li><a href="{{url("/dashboard/tables/$table")}}">{{$table}}</a></li>
                </div>
                @endif
                @endforeach
            </div>
    </div>
@endsection
