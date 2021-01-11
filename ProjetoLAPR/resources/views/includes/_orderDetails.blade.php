<div class="container " style="margin-top: 5rem;">
    <div class="wrapper bg-white mt-sm-5 mb-sm-5">
        <h4 class="pb-4 border-bottom">Order: {{$order->id}} - Details</h4>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="orderId">Order Id</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{$order->id}}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="orderPay">Order Payment Id</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{ucfirst($order->payment_id)}}">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="orderStatus">Order Status</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{$order['status']==true ? 'Paid' : 'Not Paid'}}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="orderTotal">Order Total Price</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{$order->amount}}">
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="orderId">Order Id</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{$order->created_at}}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="orderPay">Order Payment Id</label>
                    <input type="text" class="bg-light form-control" disabled placeholder="{{$order->updated_at}}">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3>Total Order itens: {{count($products)}}</h3>
        <table class="table table-striped table-hover">
            <thead>
            <tr class="align-middle text-center">
                <th>Product Image</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Stock Available</th>
                <th>Product Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="align-middle text-center">
                    <td><img src="{{asset($product->image)}}" alt="{{$product->name}}"
                             style="width: 50px;height: 70px;"></td>
                    <td>{{$product->id}}</td>
                    <td>{{ucfirst($product->name)}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->price}}</td>
                </tr>
            @endforeach
            </tbody>
            <tr class="align-middle text-center">
                <td colspan="3">&nbsp;</td>
                <td>Total Price:</td>
                <td>{{$order->amount}}</td>
            </tr>
        </table>
    </div>
</div>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

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

    .img {
        width: 100px;
        height: 100px;
        border-radius: 6px;
        object-fit: cover
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

    .form-control {
        border-radius: 10px
    }

    input[placeholder] {
        font-weight: 500
    }

    .form-control:focus {
        box-shadow: none;
        border: 1.5px solid #0779e4
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

    @media (max-width: 576px) {
        .wrapper {
            padding: 25px 20px
        }

    }
</style>
