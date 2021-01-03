<td>
    <form action="/dashboard/tables/orders/show/{{$order['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-secondary" style="border: 0px;">Details</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/orders/edit/{{$order['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-info" style="border: 0px;">Edit</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/orders/delete/{{$order['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger" style="border: 0px;">Delete</button>
    </form>
</td>
