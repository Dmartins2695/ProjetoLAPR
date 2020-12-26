<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products=Product::latest()->get();
        return view('home');
    }

    public function create(){

    }

    public function show(Product $product){

    }

    public function store(){

    }

    public function edit(Product $product){

    }

    public function update(Product $product){

    }

    public function delete(){

    }




}
