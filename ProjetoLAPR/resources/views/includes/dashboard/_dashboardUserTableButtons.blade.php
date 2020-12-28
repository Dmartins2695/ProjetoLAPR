<td>
    <form action="/dashboard/tables/users/show/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">Details</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/edit/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-info">Edit</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/delete/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/editSub/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-warning">
            @if($user->isSub())
                Unsubscribe
            @else
                Subscribe
            @endif
        </button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/prepareEmail/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">Send Email</button>
    </form>
</td>
