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

    public function store(Request $request){
        $request->validate([
            'name'=> ['required','regex:/^[ A-Za-z0-9_@.\/#&+-]*$/','unique:products'],
            'stock'=> 'numeric',
            'price'=> 'required|numeric',
            'family'=> 'alpha',
            'type'=> 'alpha',
            'brand'=> 'alpha_dash',
            'color'=> ['regex:/^\#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'description'=> ['regex:/^[ A-Za-z0-9_@.\/#&+-]*$/'],
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=252,max_width=488,max_height=640'
        ]);

        $request['image']=request('image')->store('products');

        $product= Product::create([
            'name' => $request['name'],
            'stock' => $request['stock'],
            'price' => $request['price'],
            'family' => $request['family'],
            'type' => $request['type'],
            'brand' => $request['brand'],
            'color' => $request['color'],
            'description' => $request['description'],
            'image' => $request['image'],
        ]);
        $product->save();
        return redirect('/dashboard/tables/products');
    }

    public function edit(Product $product){
        return view('dashboard.products.editProduct',['product' => $product]);
    }

    public function update(Product $product){

    }

    public function addStock(Request $request,Product $product){
        $product->stock+=$request['addStock'];
        if($product->stock>=0){
            $product->save();
            return back();
        }
        return back();
    }

    public function destroy(Product $product){
        $product->delete();
        return back();
    }




}
