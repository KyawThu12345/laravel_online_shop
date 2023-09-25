<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public $paymentmode = 'cod';
    public $ship_to_different = false;

    public function index()
    {
        $totalAmount = Cart::instance('cart')->total();
        if (session()->has('coupon')) {
            $totalAmount = session('discounted_values.totalAfterDiscount');
        }
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $totalAmount * 100,
                'currency' => 'usd',
                'payment_method_types' => ['card'],
            ]);
            return view('payment', ['paymentIntent' => $paymentIntent]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Payment processing failed. Please try again.']);
        }
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
