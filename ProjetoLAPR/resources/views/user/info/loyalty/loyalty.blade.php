@extends('layouts.app')

@section('title')
    Allegro | Loyalty
@endsection

@section('content')
    @include('includes._settingMenu')
    <div class="wrapper bg-white mt-sm-5">
        <div class="justify-content-between d-flex">
            <div class="col">
                <h3 class="pb-4 border-bottom">Loyalty points: </h3>
            </div>
            <div class="col ">
                <h3 class="pb-4 border-bottom text-end">{{$user->gainedPoints}} Pts</h3>
            </div>
        </div>
        <div class="py-2 border-bottom">
            <table class="table table-striped table-hover text-center">
                <thead>
                <th>Order Number</th>
                <th>Order Total Price</th>
                <th>Points Acquired</th>
                <th>Points Used on buy</th>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->amount}}€</td>
                        <td>{{floor($order->amount/10)}}</td>
                        <td>{{$order->usedPoints}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tr class="align-middle text-center">
                    <td>Total:</td>
                    <td>{{$total}}€</td>
                    <td>{{$totalPoints}} pts</td>
                    <td>{{$totalUsed}} pts</td>
                </tr>
            </table>
        </div>

        <div class="py-2 ">
            <h5>Total Points Gained: {{$totalPoints}}pts</h5>
            <h5>Total Points used: {{$user->usedPoints}}pts</h5>
        </div>
    </div>
    <style>
        body {
            background-color: white
        }

        .wrapper {
            padding: 30px 50px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 10px auto;
            max-width: 600px
        }

        h4 {
            letter-spacing: -1px;
            font-weight: 400
        }


        #img-section p,
        #deactivate p {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
            text-align: justify
        }

        #img-section b,
        #img-section button,
        #deactivate b {
            font-size: 14px
        }

        label {
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            color: #777;
            padding-left: 3px
        }

        input[placeholder] {
            font-weight: 500
        }

        select {
            display: block;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            height: 40px;
            padding: 5px 10px
        }

        select:focus {
            outline: none
        }


        @media (max-width: 800px) {
            .wrapper {
                padding: 25px 20px
            }
        }
    </style>

@endsection
