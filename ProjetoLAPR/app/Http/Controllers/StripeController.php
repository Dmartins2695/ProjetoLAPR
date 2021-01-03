<?php

namespace App\Http\Controllers;

use App\Mail\PaymentReceipt;
use App\Models\Order;
use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe;


class StripeController extends Controller
{
    public function showForm(Order $order)
    {
        return view('cart.payment', ['total' => Cart::subtotal(),'order' => $order]);
    }

    public function payment(Request $request,Order $order)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|alpha',
            'adress' => 'required|string',
            'zip' => 'required|digits:7|alpha_dash',
        ]);

        $amount = Cart::subtotal();
        $payment = Payment::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'adress' => $request->input('adress'),
            'zip' => $request->input('zip'),
            'amount' => $amount,
            'receipt_email' => $request->input('email')
        ]);

        $amount *= 100;
        $amount = (int)$amount;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=Stripe\Charge::create ([
            'receipt_email' => $request['email'],
            'amount' => $amount,
            'currency' => 'eur',
            "source" => $request->stripeToken,
            'description' => 'Allegro payment',
            'metadata' =>[
                'order_id'=> $order->id,
                ]
        ]);
        $payment->status=true;
        $payment->token=$charge['id'];
        $payment->save();
        $order->payment_id=$payment->id;
        $order->status=true;
        $order->save();
        Mail::to($payment->email)->send(new PaymentReceipt($payment));
        return  redirect()->route('home')->with('message', 'Code of purchase sent to email given!');
    }
}

