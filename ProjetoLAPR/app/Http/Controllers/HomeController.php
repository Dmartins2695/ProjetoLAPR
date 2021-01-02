<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products=Product::paginate(6);
        return view('home',['products'=>$products]);
    }


    private function tableNames()
    {
        $tables = \DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        return $tables;
    }
}
