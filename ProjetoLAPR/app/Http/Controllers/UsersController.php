<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        return view('dashboard.showUser',['user'=>$user]);
    }


    public function edit(User $user)
    {
        return view('dashboard.editUser',['user'=>$user]);
    }

    public function editSub(User $user)
    {
        if($user->isSub()){
            $user->deleteRole('sub');
        }else{
            $user->assignRole('sub');
        }
        return back();
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
