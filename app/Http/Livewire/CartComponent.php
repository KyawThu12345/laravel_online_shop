<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        session()->flash('success_message', 'Item has been removed');
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    // public function applyCouponCode()
    // {
    //     // dd("Coupon code to check: " . $this->couponCode);
    //     $couponCode = $this->couponCode;
    //     $cartSubtotal = Cart::instance('cart')->subtotal();
    //     $query = "SELECT * FROM coupons WHERE code = '$couponCode' AND cart_value <= $cartSubtotal";
    //     $coupon = DB::select($query);
    //     $coupon = Coupon::where('code', $this->couponCode)->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
    //     dd($coupon);
    //     if (!$coupon) {
    //         session()->flash('coupon_message', 'Coupon code is invalid');
    //         return;
    //     }
    //     session()->put('coupon', [
    //         'code' => $coupon->code,
    //         'type' => $coupon->type,
    //         'value' => $coupon->value,
    //         'cart_value' => $coupon->cart_value,
    //     ]);
    // }
    public function applyCouponCode()
    {
        session()->put('discounted_values', [
            'subtotalAfterDiscount' => $this->subtotalAfterDiscount,
            'taxAfterDiscount' => $this->taxAfterDiscount,
            'totalAfterDiscount' => $this->totalAfterDiscount,
        ]);
        // dd($this->couponCode);
        // dd("Method triggered");
        // Debug: Output coupon code being checked
        // dd("Coupon code to check: " . $this->couponCode);

        // $coupon = Coupon::where('code', $this->couponCode)
        //     ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
        //     ->first();
        $couponCode = $this->couponCode;
        // $cartSubtotal = Cart::instance('cart')->subtotal();
        // dd("Checking coupon code:", $couponCode, "Cart Subtotal:", $cartSubtotal);

        $coupon = Coupon::where('code', $couponCode)->where('expiry_date', '>=', Carbon::today())->first();
        // DB::enableQueryLog();
        // $coupon = Coupon::where('code', $this->couponCode)
        //     ->where('expiry_date', '>=', Carbon::today()->format('Y-m-d'))
        //     ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
        //     ->first();
        // $coupon = Coupon::where('code', $this->couponCode)
        //     ->where('expiry_date', '>=', Carbon::today())
        //     ->where('cart_value', '<=', $this->cartSubtotal)
        //     ->first();
        // $query = Coupon::where('code', $couponCode)
        //     ->where('expiry_date', '>=', Carbon::today()->format('Y-m-d'))
        //     ->where('cart_value', '<=', Cart::instance('cart')->subtotal())
        //     ->toSql();
        // dd($couponCode, Carbon::today()->format('Y-m-d'), Cart::instance('cart')->subtotal());


        // $queryLog = DB::getQueryLog();
        // dd("Query Log:", $queryLog);
        // $cartSubtotal = Cart::instance('cart')->subtotal();
        // $query = "SELECT * FROM coupons WHERE code = '$couponCode' AND cart_value <= $cartSubtotal";
        // $coupon = DB::select($query);
        // Debug: Output retrieved coupon
        // dd("Coupon found:", $coupon);
        // dd("Checking coupon code:", $couponCode, "Cart Subtotal:", $cartSubtotal);

        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid');
            // dd("Coupon not found or invalid");
            return;
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
        $this->calculateDiscounts();
        session()->flash('coupon_message', 'Coupon applied successfully');
        return redirect()->route('shop.checkout');
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }
            // dd("Discount: " . $this->discount);
            // dd("Subtotal: " . Cart::instance('cart')->subtotal());
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
            // dd($this->subtotalAfterDiscount, $this->taxAfterDiscount, $this->totalAfterDiscount);

            session()->put('discounted_values.subtotalAfterDiscount', $this->subtotalAfterDiscount);
            session()->put('discounted_values.taxAfterDiscount', $this->taxAfterDiscount);
            session()->put('discounted_values.totalAfterDiscount', $this->totalAfterDiscount);
        }
    }
    public function removeCoupon()
    {
        session()->forget('coupon');
    }
    public function render()
    {
        // dd($this->cart);
        $coupon = session()->get('coupon');
        if ($coupon && array_key_exists('cart_value', $coupon)) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        return view('livewire.cart-component');
    }
}
