<div class="row align-items-center justify-content-center mb-3" style="margin-top:45px">
    <div class="col-sm-4 text-start border-bottom">
        <h2 class="mx-auto">Information {{ucfirst($user->name)}}</h2>
    </div>
</div>
<div class="container " style="margin-top: 5rem;">
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Username:</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$user->name}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Email: </label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$user->email}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Account created: </label>
            </div>
            <div class="col-sm-2 text-start border-bottom">
                {{$user->created_at}}
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Role:</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">

                @foreach(($user->roles) as $role)
                {{$role->name}},
                @endforeach
            </div>
        </div>
    </div>
    <div class="container mb-2">
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-2 text-start border-bottom">
                <label for="Username">Loyalty status:</label>
            </div>
            <div class="col-sm-2 text-start border-bottom">

            </div>
        </div>
    </div>
    <br>
    <div class="container mb-2">
        <div class="row align-items-start justify-content-center">
            <div class="col-sm-4 text-start">
                <form action="{{route('editUserInfo')}}" method="get">
                    <button type="submit" class="btn btn-primary">
                        Edit Information</button>
                </form>
                
            </div>
        </div>
    </div>
</div>