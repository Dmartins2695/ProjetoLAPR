<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function dashboard()
    {
        $this->middleware('auth');
//        $tables = $this->tableNames();
        return view('dashboard.dashboard'/*, ['tables' => $tables]*/);
    }

    private function tableNames()
    {
        $tables = \DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        return $tables;
    }
}
