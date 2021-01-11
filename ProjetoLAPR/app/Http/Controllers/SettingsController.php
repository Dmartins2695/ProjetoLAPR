<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user.info.settings',['user'=>$user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.info.editUserInfo',['user'=>$user]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('message', 'Your information was successfully updated!!');
    }

    public function resetPassword(Request $request, User $user){
        $request->validate([
            'passCur' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if(Hash::check($request['passCur'],$user->password)){
            $user->update([
                'password' => Hash::make($request['password']),
            ]);
            return back()->with('message', 'Password was successfully changed');
        }
        return back()->with('messageDanger', 'Please make sure you insert your previous password right!');
    }

    public function delete( User $user){
        $user->delete();
        return redirect()->route('register')->with('messageDanger', 'You deleted your account!');
    }
}
