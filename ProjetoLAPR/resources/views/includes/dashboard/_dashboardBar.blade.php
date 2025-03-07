<div class="container ">
    <div class="row justify-content-around">
        <div class="col-sm me-auto hover text-center">
            <a class="text-dark" href="{{url("/dashboard/tables/users")}}">
                <button type="button" class="btn btn-outline-dark"
                        style="border-top-color: white;border-left-color:white;border-right-color: white; border-bottom-color: white;">
                    Users
                </button>
            </a>
        </div>
        <div class="col-sm me-auto hover text-center">
            <a href="{{url("/dashboard/tables/subs")}}">
                <button class="btn btn-outline-dark"
                        style="border-top-color: white;border-left-color:white;border-right-color: white; border-bottom-color: white;">
                    Subscribed Users
                </button>
            </a>
        </div>
        <div class="col-sm me-auto hover text-center">
            <a href="{{url("/dashboard/tables/products")}}">
                <button class="btn btn-outline-dark"
                        style="border-top-color: white;border-left-color:white;border-right-color: white; border-bottom-color: white;">
                    Products
                </button>
            </a>
        </div>
        <div class="col-sm me-auto hover text-center">
            <a href="{{route('ordersTable')}}">
                <button class="btn btn-outline-dark"
                        style="border-top-color: white;border-left-color:white;border-right-color: white; border-bottom-color: white;">
                    Orders
                </button>
            </a>
        </div>
        <hr>
    </div>
</div>
