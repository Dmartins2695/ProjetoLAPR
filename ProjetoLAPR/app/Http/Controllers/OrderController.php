<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders(){
        $tableName = 'orders';
        $orders=Order::paginate(5);
        return view('dashboard.tables', ['orders' => $orders, 'tableName' => $tableName]);
    }

    public function show(Order $order){
        $products=$order->products();
        return view('dashboard.orders.showOrder',['order'=>$order,'products'=>$products]);
    }
    public function edit(Order $order){
        return view('dashboard.orders.editOrder',['order'=>$order]);
    }
    public function update(Request $request,Order $order){
        $request->validate([
            'status' => 'required|numeric'
        ]);
        $order->update($request->all());
        return back()->with('message', 'Order: '.ucfirst($order->id) . "- Updated with success!");
    }
    public function delete(Order $order){
        $name=ucfirst($order->id);
        $order->delete();
        return back()->with('messageDanger', 'Order: '.ucfirst($name) . "- Deleted from database!");
    }
}
