<td>
    <form action="/dashboard/tables/users/show/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-secondary">Details</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/edit/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-info" style="color: white;">Edit</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/delete/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/editSub/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-warning">
            @if($user->isSub())
                Unsubscribe
            @else
                Subscribe
            @endif
        </button>
    </form>
</td>
