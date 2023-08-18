<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product;
    public $name, $slug, $short_description, $description, $regular_price, $image, $sale_price, $SKU, $stock_status, $featured, $quantity, $category_id, $newimage, $product_id;
    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->product_id = $product->product_id;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function productIDGenerate($name)
    {
        $data = DB::select("SHOW TABLE STATUS LIKE '" . $name . "'");
        $lastid = $data[0]->Auto_increment;
        return 'PID-' . date('Ymdt') . '-' . sprintf("%0" . 10 . "d", $lastid);
    }
    public function updateProduct()
    {
        $product = Product::find($this->product_id);
        if ($product) {
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
        } else {
            Log::error('Product not found');
            return;
        }

        if ($this->newimage) {
            $productId = $this->productIDGenerate('products');
            $imageName = $productId . '.' . $this->newimage->extension();
            $this->newimage->storeAs('assets/imgs/shop/products/', $imageName, 'public');
            $product->image = $imageName;
            if ($product->save()) {
                Log::info('Product image saved successfully: ' . $imageName);
            } else {
                Log::error('Error saving product image');
            }
        }
        if ($this->category_id !== null) {
            $product->category_id = $this->category_id;
        }
        if ($product->save()) {
            session()->flash('message', 'Product has been updated successfully!');
        } else {
            Log::error('Error saving product');
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories]);
    }
}
