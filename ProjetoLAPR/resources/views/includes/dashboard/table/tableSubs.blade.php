<th>Name</th>
<th>Email</th>
<th>Email Verified</th>
<th>Created</th>
<th>|</th>
<th></th>
<th></th>
<th></th>
<th></th>
<caption>List of Subscribed Users</caption>
@foreach($users as $user)
    <tr class="align-middle">
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['email_verified_at']}}</td>
        <td>{{$user['created_at']}}</td>
        @include('includes.dashboard._dashboardUserTableButtons')
    </tr>
@endforeach
{!! $users->onEachSide(2)->links('pagination::bootstrap-4')!!}
