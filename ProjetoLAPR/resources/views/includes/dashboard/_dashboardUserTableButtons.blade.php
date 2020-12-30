<td>
    <form action="/dashboard/tables/users/show/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-secondary" style="border: 0px;">Details</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/edit/{{$user['id']}}" method="get">
        @csrf
        <button type="submit" class="btn btn-outline-info" style="border: 0px;">Edit</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/delete/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger" style="border: 0px;">Delete</button>
    </form>
</td>
<td>
    <form action="/dashboard/tables/users/editSub/{{$user['id']}}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-warning" style="border: 0px;">
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
        <button type="submit" class="btn btn-outline-secondary" style="border: 0px;">Send Email</button>
    </form>
</td>
