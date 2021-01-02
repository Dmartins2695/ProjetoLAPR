{{--<form action="{{route('showCart')}}" method="post">
    @csrf
    <div class=" btn-group dropstart">
        <button class="btn btn-outline-secondary dropdown-toggle" type="submit" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false" style="border: unset">
            <img src="{{asset('nav-cart.png')}}" alt="cart">
            Cart
        </button>

        <ul class="dropdown-menu dropdown-cart" role="menu" aria-labelledby="dropdownMenuButton">
            --}}{{--        {{$cartProducts=\Gloudemans\Shoppingcart\Facades\Cart::content()}}--}}{{--
            @if(isset($cart))
                @foreach($cart as $product)
                    --}}{{--                {{$product=\App\Models\Product::where('id',$product->id)->get()}}--}}{{--
                    <li>
                  <span class="item">
                    <span class="item-left">
                        <img
                            src="{{asset($product[0]->image)}}"
                            alt="{{$product[0]->name}}"/>
                        <span class="item-info">
                            <span>{{$product[0]->name}}</span>
                            <span>{{$product[0]->price}}$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-sm btn-danger"> X </button>
                    </span>
                </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</form>--}}

