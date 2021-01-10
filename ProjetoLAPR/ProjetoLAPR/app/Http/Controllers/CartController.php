<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(){
        return "cart";
    }

    public function show(){
        return "showCart";
    }
}
