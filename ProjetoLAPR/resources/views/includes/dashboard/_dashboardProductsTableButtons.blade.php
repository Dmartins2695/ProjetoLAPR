<td>
    <form action="{{route('showProduct',$product->id)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-secondary" style="border: 0px;">Details</button>
    </form>
</td>
<td>
    <form action="{{route('editProduct',$product->id)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-info" style="border: 0px;">Edit</button>
    </form>
</td>
<td>
    <form action="{{route('deleteProduct',$product->id)}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger" style="border: 0px;">Delete</button>
    </form>
</td>
<td>
    <form action="{{route('addStock',$product->id)}}" style="width: 150px;margin: unset;" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-success" style="border: 0px;">Add stock</button>
        <input type="number" name="addStock"  class="form-control"  style="width: 30%;display: inline-table;padding: .375rem .15rem" value="0">
    </form>
</td>

