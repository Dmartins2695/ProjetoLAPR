<td>
    <form action="{{route('showProduct',$product->id)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-secondary">Details</button>
    </form>
</td>
<td>
    <form action="{{route('editProduct',$product->id)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-info" style="color: white;">Edit</button>
    </form>
</td>
<td>
    <form action="{{route('deleteProduct',$product->id)}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
