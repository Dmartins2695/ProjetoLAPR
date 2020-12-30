<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{

    public function index(){
        $products=Product::latest()->get();
        return view('home');
    }

    public function create(){
        $tags=Tag::all();
        return view('dashboard.products.createProduct',['tags' =>$tags]);
    }

    public function show(Product $product){
        return view('dashboard.products.showProduct',['product' => $product,'tags'=>$product->tags]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=> ['required','string'],
//            'name'=> ['required',"regex:/ ^[A-Za-z0-9_@.\/#&+-]*$/"],
            'stock'=> 'numeric',
            'price'=> 'required|numeric',
            'tags'=> 'required|exists:tags,name',
            'type'=> 'alpha',
            'brand'=> 'alpha_dash',
            'color'=> ['regex:/^\#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
//            'description'=> ["regex:/^[A-Za-z0-9_@.#&+-]*$']/"],
            'description'=> 'string',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        $image['image']=request('image')->store('products');

        $product= Product::create([
            'name' => $request['name'],
            'stock' => $request['stock'],
            'price' => $request['price'],
            'type' => $request['type'],
            'brand' => $request['brand'],
            'color' => $request['color'],
            'description' => $request['description'],
            'image' => $image['image'],
        ]);

        foreach ($request->tags as $tag){
            $product->assignTag($tag);
        }
        $product->save();
        return redirect('/dashboard/tables/products')->with('message', ucfirst($product->name)." was created successfully!");;
    }

    public function edit(Product $product){
        $tags=Tag::all();
        return view('dashboard.products.editProduct',['product' => $product,'tags'=>$tags]);
    }

    public function update(Request $request,Product $product){
        $request->validate([
            'name'=> ['required','string'],
//            'name'=> ['required',"regex:/ ^[A-Za-z0-9_@.\/#&+-]*$/"],
            'stock'=> 'numeric',
            'price'=> 'required|numeric',
            'type'=> 'alpha',
            'brand'=> 'alpha_dash',
            'color'=> ['regex:/^\#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
//            'description'=> ["regex:/^[A-Za-z0-9_@.#&+-]*$']/"],
            'description'=> 'string',
            'image'=> 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        if($request['image']){
            $image['image']=request('image')->store('products');
            $product->update([
                'name' => $request['name'],
                'stock' => $request['stock'],
                'price' => $request['price'],
                'type' => $request['type'],
                'brand' => $request['brand'],
                'color' => $request['color'],
                'description' => $request['description'],
                'image' => $image['image'],
            ]);
        }else{
            $product->update([
                'name' => $request['name'],
                'stock' => $request['stock'],
                'price' => $request['price'],
                'type' => $request['type'],
                'brand' => $request['brand'],
                'color' => $request['color'],
                'description' => $request['description'],
            ]);
        }

        return back()->with('message', ucfirst($product->name).": Updated with success!");
    }

    public function addStock(Request $request,Product $product){
        $product->stock+=$request['addStock'];
        if($product->stock>=0){
            $product->save();
            return back()->with('message', ucfirst($product->name)." stock was change to: ".$product->stock);
        }
        return back()->with('messageDanger', ucfirst($product->name)." Can't have negative stock!!" );
    }

    public function destroy(Product $product){
        $product->delete();
        return back()->with('messageDanger', ucfirst($product->name).": Deleted from database!");
    }

    public function productsPdf(){
        $products=Product::all();
        $pdf = PDF::loadView('dashboard.products.productStocks', ['products' => $products]);
        return $pdf->download('productStocks.pdf');
    }
}
