@foreach($products->chunk(3) as $chunk)
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($chunk as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 src="{{$product->image}}"
                                 alt="{{$product->name}}" style="width: 100%; height: 15vw; object-fit: cover">
                            <div class="card-body">
                                <h6>{{$product->name}}</h6>
                                <p class="card-text">{{$product->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{url('/home/addToCart')}}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    style="border-right: unset;border-radius: unset;">
                                                <img src="{{asset('shopping-cart.png')}}" alt="">
                                                Add Cart
                                            </button>
                                        </a>
                                        <a href="">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    style="border-radius: unset;">View
                                            </button>
                                        </a>
                                    </div>
                                    <small class="text-muted">{{$product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
