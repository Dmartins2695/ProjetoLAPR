@foreach($products->chunk(3) as $chunk)
    <div class="row gx-0 d-flex justify-content-evenly mb-3">
        @foreach($chunk as $product)
            <div class="col-sm-2 card">
                <img src="{{$product->image}}" class="rounded card-img-top"
                     alt="{{$product->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text" >{{$product->description}}</p>
                </div>
                <a href="{{url('/home/addToCart')}}" class="btn btn-primary"
                   style="padding: 0.1rem 0.6rem; border: 0;"><span><img src="{{asset('shopping-cart.png')}}"
                                                                         alt="cart">Add to Cart</span>
                    {{$product->price}}</a>
            </div>
        @endforeach
    </div>
@endforeach
