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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return back()->with('message', ucfirst($user->name).": Updated with success!");
    }
}
