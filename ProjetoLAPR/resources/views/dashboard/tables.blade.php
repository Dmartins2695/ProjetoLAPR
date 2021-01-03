@extends('layouts.app')

@section('title')
    Dashboard | {{ucfirst($tableName)}}
@endsection

@section('content')
    @include('includes.dashboard._dashboardBar')
    <div {{$tableName==='products'?'class=row':"class=container"}}>
        @if($tableName==='products')
            @include('includes.dashboard.table.productButtons')
        @endif
        <div {{$tableName==='products'?"class=col-md-10 style=width:82rem":"class=container"}}>
            <table class="table table-striped table-hover">
                @switch($tableName)
                    @case('subscribed Users')

                    @include('includes.dashboard.table.tableSubs')

                    @break
                    @case('users')

                    @include('includes.dashboard.table.tableUsers')

                    @break
                    @case('products')

                    @include('includes.dashboard.table.tableProducts')

                    @break

                    @case('orders')

                    @include('includes.dashboard.table.tableOrders')

                    @break
                    @default
                    <h2>No records to display!</h2>
                @endswitch()

            </table>
        </div>
    </div>
@endsection
