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
<td>
    <form action="{{route('addStock',$product->id)}}" style="width: 130px;margin: unset;" method="post">
        @csrf
        <button type="submit" class="btn btn-success">Add stock</button>
        <input type="text" name="name"  class="form-control"  style="width: 22%;display: inline-table;padding: .375rem .15rem" value="0">
    </form>
</td>

