<?php

namespace App\Http\Controllers;

use App\Mail\ContactUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{


    public function show(User $user)
    {
        return view('dashboard.users.showUser',['user'=>$user]);
    }


    public function edit(User $user)
    {
        return view('dashboard.users.editUser',['user'=>$user]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user->update($request->all());
        return back()->with('success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success');
    }

    public function prepareEmail(User $user)
    {
        return view('dashboard.users.emailUser',['user'=>$user]);
    }

    public function sendEmail(Request $request, User $user)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Mail::to($user->email)->send(new ContactUser($request));
        return  back()->with('message', 'Email sent with success!');
    }


}
