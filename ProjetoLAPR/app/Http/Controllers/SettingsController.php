<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show(User $user)
    {
        return view('user.settings',['user'=>$user]);
    }
}
