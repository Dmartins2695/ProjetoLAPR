<div class="row align-items-center justify-content-center mb-3" style="margin-top:45px">
    <div class="col-sm-4 text-start border-bottom">
        <h2 class="mx-auto">Details from Order number: {{$order->id}}</h2>
    </div>
</div>
<div class="container " style="margin-top: 5rem;">
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Payment Id</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$order->payment_id}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Order Status</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$order['status']==true ? 'Paid' : 'Not Paid'}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Created at</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$order->created_at}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Paid at</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$order->updated_at}}
            </div>
        </div>
    </div>
</div>
