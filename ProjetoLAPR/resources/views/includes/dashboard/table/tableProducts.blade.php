<th>Product id</th>
<th>Name</th>
<th>Stock</th>
<th>Price</th>
<th>Brand</th>
<th>|</th>
<th></th>
<th></th>
<th></th>
<th></th>
<caption>List of Products</caption>
@foreach($products as $product)
    <tr class="align-middle">
        <td>{{$product['id']}}</td>
        {{--                        <td>{{$product['image']}}</td>--}}
        <td>{{$product['name']}}</td>
        <td>{{$product['stock']}}</td>
        <td>{{$product['price']}}</td>
        <td>{{$product['brand']}}</td>
        @include('includes.dashboard._dashboardProductsTableButtons')
    </tr>
@endforeach
{!! $products->links('pagination::bootstrap-4')!!}
