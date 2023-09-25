<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Session;
use Illuminate\Support\Facades\Route;

class CheckoutComponent extends Component
{
    public $paymentIntent;
    public $discount;
    public $subtotalAfterDiscount;
    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;
    public function redirectToCheckout()
    {
        $paymentIntent = "your_payment_intent_value"; // Replace with your actual payment intent value
        $checkoutRoute = route('shop.checkout', ['paymentIntent' => $paymentIntent]);

        return redirect($checkoutRoute);
    }

    public function mount()
    {
        $this->paymentIntent = request()->get('paymentIntent');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        if ($this->ship_to_different) {
            $this->validateOnly($fields, [
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required'
            ]);
        }
    }
    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        $subtotal = $this->calculateSubtotal(); // Replace with your calculation logic
        $discount = $this->calculateDiscount(); // Replace with your calculation logic
        $tax = $this->calculateTax($subtotal);
        // dd([
        //     'subtotal' => $subtotal,
        //     'discount' => $discount,
        //     'tax' => $tax,
        // ]);
        if (session()->has('coupon')) {
            $discount = $this->calculateDiscount(); // Replace with your coupon discount calculation logic
            $subtotalAfterDiscount = $subtotal - $discount;
            $taxAfterDiscount = $this->calculateTax($subtotalAfterDiscount);
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;
        } else {
            // No coupon applied
            $subtotalAfterDiscount = $subtotal;
            $taxAfterDiscount = $this->calculateTax($subtotal);
            $totalAfterDiscount = $subtotal + $taxAfterDiscount;
        }
        $totalAfterDiscount = $subtotal - $discount + $tax;
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = $subtotal;
        $order->discount = $discount;
        $order->subtotal_after_discount = $subtotalAfterDiscount;
        $order->tax = $tax;
        $order->total = $totalAfterDiscount;

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();
        $cartContent = Cart::instance('cart')->content();
        // dd($cartContent);
        if ($cartContent->isNotEmpty()) {
            foreach (Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->save();
            }
        }

        if ($this->ship_to_different) {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_country' => 'required',
                's_zipcode' => 'required'
            ]);
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->firstname;
            $shipping->lastname = $this->lastname;
            $shipping->email = $this->email;
            $shipping->mobile = $this->mobile;
            $shipping->line1 = $this->line1;
            $shipping->line2 = $this->line2;
            $shipping->city = $this->city;
            $shipping->province = $this->province;
            $shipping->country = $this->country;
            $shipping->zipcode = $this->zipcode;
            $shipping->save();
        }
        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        if (session()->has('coupon')) {
            session()->forget(['coupon']);
        }
        $this->emit('thankYou');
        $this->thankyou = true;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        // dd(session()->get('checkout'));
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        }
        // } else if (!session()->get('checkout')) {
        //     return redirect()->route('shop.cart');
        // }

    }
    private function calculateSubtotal()
    {
        $subtotal = 0;
        $cartContent = Cart::instance('cart')->content();
        foreach ($cartContent as $item) {
            $subtotal += $item->price * $item->qty;
        }
        return $subtotal;
    }
    private function calculateDiscount()
    {
        $discount = 0;
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon');
            if ($coupon['type'] == 'fixed') {
                // Calculate fixed amount discount
                $discount = $coupon['value'];
            } elseif ($coupon['type'] == 'percentage') {
                // Calculate percentage-based discount
                $subtotal = $this->calculateSubtotal();
                $discount = ($subtotal * $coupon['value']) / 100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->total() - $this->discount;

            session()->put('discounted_values.subtotalAfterDiscount', $this->subtotalAfterDiscount);
        }
        return $discount;
    }
    private function calculateTax($subtotal)
    {
        $taxRate = 0.12; // Replace with your tax rate
        $tax = $subtotal * $taxRate;
        return $tax;
    }

    private function calculateTotal($subtotal, $discount, $tax)
    {
        $total = $subtotal - $discount + $tax;
        Log::debug('Calculated Total', ['total' => $total]);


        return $total;
    }
    // $total = $this->calculateTotal($subtotal, $discount, $tax);

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component', [
            'paymentIntent' => $this->paymentIntent,
        ]);
    }
}
