@extends('layouts.dashLayout')

@section('title')
    Dashboard | Update Order
@endsection

@section('content')

    @include('includes.dashboard._dashboardBar')

    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-4 col-md-offset-4">
                <h2 class="mx-auto">Update Order Number: {{$order->id}}</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-4 col-md-offset-4">
                <form method="POST" action='{{route('updateOrder',$order->id)}}'enctype="multipart/form-data">
                    @csrf
                    <label for="status" class="col-md-8 col-form-label text-md-right">{{ __('Status of Order (0->Not Paid|1->Paid)') }}</label>

                    <div class="mb-3">
                        <input id="status" type="number" min="0" max="1" class="form-control @error('status') is-invalid @enderror"
                               name="status" value="{{ $order->status }}" autocomplete="status">

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mt">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Order') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
