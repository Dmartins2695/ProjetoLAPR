<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function showSubs()
    {
        $tableName = 'users';
        $users = User::all();
        foreach ($users as $user) {
            $roles = $user->rolesNames();
            foreach ($roles as $role) {
                if (strcmp('sub', $role) == 0) {
                    $show[] = $user;
                }
            }
        }
        return view('dashboard.tables', ['users' => $show, 'tableName' => $tableName]);
    }

    public function showProducts()
    {
        $tableName = 'products';
        $product['name']='viola';
        $product['price']=18.83;
        $products[]=$product;
        return view('dashboard.tables', ['products' => $products, 'tableName' => $tableName]);
    }
}
