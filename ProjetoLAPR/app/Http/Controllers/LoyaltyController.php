<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoyaltyController extends Controller
{
    public function show(){
        $user=Auth::user();
        $orders=$user->orders;
        $total=0;
        $totalPoints=0;
        $totalUsed=0;
        foreach ($orders as $order){
            $total+=$order->amount;
            $totalPoints+=floor($order->amount/10);
            $totalUsed+=$order->usedPoints;
        }

        return view('user.info.loyalty.loyalty',['user' =>$user,'orders'=>$orders,'total'=>$total,'totalUsed'=>$totalUsed,'totalPoints'=>$totalPoints]);
    }
}
