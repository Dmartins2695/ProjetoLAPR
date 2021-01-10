<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function dashboard()
    {
        $this->middleware('auth');
//        $tables = $this->tableNames();
        return view('dashboard.dashboard'/*, ['tables' => $tables]*/);
    }

    public function showUsers()
    {
        $show = null;
        $tableName = 'subscribed Users';
        $users = User::all();
        foreach ($users as $user) {
            $roles = $user->rolesNames();
            foreach ($roles as $role) {
                if (strcmp('user', $role) == 0) {
                    $show[] = $user;
                }
            }
        }
        if ($show != null) {
            $users = User::paginate(15);
            return view('dashboard.tables', ['users' => $show, 'pUsers' => $users, 'tableName' => $tableName]);
        } else {
            $tableName = '';
            $show = '1';
            return view('dashboard.tables', ['users' => $show, 'pUsers' => $users, 'tableName' => $tableName]);
        }

    }

    public function showSubs()
    {
        $show = null;
        $tableName = 'subscribed Users';
        $users = User::all();
        foreach ($users as $user) {
            $roles = $user->rolesNames();
            foreach ($roles as $role) {
                if (strcmp('sub', $role) == 0) {
                    $show[] = $user;
                }
            }
        }
        if ($show != null) {
            $users = User::paginate(15);
            return view('dashboard.tables', ['users' => $show, 'pUsers' => $users, 'tableName' => $tableName]);
        } else {
            $tableName = '';
            $show = '1';
            return view('dashboard.tables', ['users' => $show, 'pUsers' => $users, 'tableName' => $tableName]);
        }
    }

    public function showProducts()
    {
        $tableName = 'products';
        $products = Product::paginate(15);
        return view('dashboard.tables', ['products' => $products, 'tableName' => $tableName]);
    }



}
