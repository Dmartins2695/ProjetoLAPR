<th>Order ID</th>
<th>Payment ID</th>
<th>User ID</th>
<th>Order Status</th>
<th>Created</th>
<th>Updated</th>
<th>|</th>
<th></th>
<th></th>
<caption>List of Users</caption>
@foreach($orders as $order)
    <tr class="align-middle">
        <td>{{$order['id']}}</td>
        <td>{{$order['payment_id']}}</td>
        <td>{{$order['user_id']}}</td>
        <td>{{$order['status']==true ? 'Paid' : 'Not Paid'}}</td>
        <td>{{$order['created_at']}}</td>
        <td>{{$order['updated_at']}}</td>
        @include('includes.dashboard._dashboardOrdersTableButtons')
    </tr>
@endforeach
{!! $orders->onEachSide(2)->links('pagination::bootstrap-4')!!}
