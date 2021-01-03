@extends('layouts.app')

@section('title')
    Allegro | Settings
@endsection

@section('content')
    @include('includes._settingMenu')  
    @include('user.info.userInfo')

@endsection

