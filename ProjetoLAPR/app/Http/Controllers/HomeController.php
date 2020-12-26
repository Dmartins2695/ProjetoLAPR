<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    {   $tables=$this->tableNames();
       return view('dashboard',['tables'=>$tables]);
    }

    private function tableNames(){
        $tables = \DB::select('SHOW TABLES');
        $tables = array_map('current',$tables);
        return $tables;
    }
}
