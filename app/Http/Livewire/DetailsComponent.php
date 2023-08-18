<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('livewire.details-component', [
            'product' => $product,
            'rproducts' => $rproducts,
            'nproducts' => $nproducts,
            'categories' => $categories
        ], compact('product', 'relatedProducts'));
    }
}
