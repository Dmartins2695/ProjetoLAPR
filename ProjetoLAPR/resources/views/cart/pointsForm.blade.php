@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    @include('includes._wraperBarFilters')
    <div class="wrapper bg-white mt-sm-5">
        <div class="justify-content-between d-flex">
            <div class="col">
                <h3 class="pb-4 border-bottom">Loyalty points: </h3>
            </div>
            <div class="col ">
                <h3 class="pb-4 border-bottom text-end">{{$user->gainedPoints}} Pts</h3>
            </div>
        </div>
        <p>(1 points equals to 0.10€)</p>
        <div class="row py-2 ">
            <form action="{{route('showPayment',[$order])}}" method="get">
                @csrf
                <div class="row py-2 pb-2">
                    <div class="col-md-6">
                        <label for="userRoles">Order total price</label>
                        <div class="col-sm-6 form-control border"
                             style="background-color: #f8f9fa; font-weight: 500; color:#6c757d;">
                            {{$order->amount}}
                        </div>
                    </div>
                    <div class="col-md-6 pt-md-0 pt-3"><label for="phone">Choose Points to Use</label>
                        <input type="number" name="pointsToUse" value="0"
                               class="bg-light form-control"
                               placeholder="0 pts">
                    </div>
                </div>
                <div class="py-3 pb-4 border-bottom">
                    <button type="submit" class="btn btn-primary mr-3">Proceed to Payment</button>
                </div>
            </form>
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
