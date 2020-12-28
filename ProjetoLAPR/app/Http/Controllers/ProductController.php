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
        return view('dashboard.products.createProduct');
    }

    public function show(Product $product){
        return view('dashboard.products.showProduct',['product' => $product]);
    }

    public function store(){

    }

    public function edit(Product $product){
        return view('dashboard.products.editProduct',['product' => $product]);
    }

    public function update(Product $product){

    }

    public function destroy(Product $product){
        $product->delete();
        return back();
    }




}
