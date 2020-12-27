<td>
    <form action="/dashboard/tables/users/show/{{$user['id']}}" method="get">
        <button type="submit" class="btn btn-secondary">Details</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/edit/{{$user['id']}}" method="get">
        <button type="submit" class="btn btn-info" style="color: white;">Edit</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/delete/{{$user['id']}}" method="post">
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
