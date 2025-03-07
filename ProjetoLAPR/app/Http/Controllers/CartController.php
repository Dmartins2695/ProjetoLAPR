<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product){
        $price=str_replace('€','',$product->price);
        Cart::add($product->id,$product->name,1,$price)->associate('Product');
        return redirect()->route('home');
    }

    public function show(){
        $cart=$this->getCart();
        return  view('cart.showCart',['cart'=>$cart]);
    }

    public function delete($rowId){
        $product=Cart::get($rowId);
        Cart::remove($rowId);
        return back()->with('messageDanger', ucfirst($product->name)." was removed from your Cart");
    }

    public function update(Request $request,String $rowId){
        $product=Cart::get($rowId);
        $request->validate([
        'qty'=> 'numeric|required'
            ]);
        Cart::update($rowId,$request['qty']);
        return back()->with('message', ucfirst($product->name)." quantity was change to ".$request['qty']);
    }

    public function destroy(){
        Cart::destroy();
        return back();
    }

    public function checkout(){
        $cart=$this->getCart();
        $user=Auth::user();
        if (isset($cart)){
            $order=Order::create();
            foreach ($cart as $productCart){
                if($productCart->stock-$productCart->qty>=0){
                    $productDb=Product::find($productCart->id);
                    $productDb->stock-=$productCart->qty;
                    $productDb->save();
                    $order->addProduct($productDb);
                    $productDb->addOrder($order);
                }else{
                    return back()->with('messageDanger','We dont have stock: '.$productCart->qty.' of: '.$productCart->name);
                }
            }
            if (isset($user) and $user->hasRole('sub')){
                $order->user_id=$user->id;
            }
            if(isset($order)){
                $order->amount=Cart::subtotal();
                $order->save();
            }
            if (isset($user) and $user->hasRole('sub')){
                return redirect()->route('pointForm',[$user->id,$order]);
            }
            return redirect()->route('showPayment',$order);
        }
        return back()->with('messageDanger','No products to checkout!!');
    }

    public function pointForm(User $user,Order $order){
        return view('cart.pointsForm',['user'=>$user,'order'=>$order]);
    }

    public function getCart(){
        $cartProducts=Cart::content();
        foreach ($cartProducts as $r){
            $prov=Product::where('id',$r->id)->get();
            $prov[0]->qty=$r->qty;
            $prov[0]->rowId=$r->rowId;
            $cart[]=$prov[0];
        }
        if(isset($cart)){
            return $cart;
        }
        return null;
    }


}
