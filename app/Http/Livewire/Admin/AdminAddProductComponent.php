<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name, $slug, $short_description, $description, $regular_price, $image, $sale_price,$rate,$stock_status, $quantity, $category_id;
    public function mount()
    {
        $this->stock_status = 'instock';
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
    // "C:\xampp\htdocs\laravel_online_shop\public\storage\assets\imgs\shop\products\assets\imgs\shop\products\PID-2023081031-0000000025.jpg"
    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->rate = $this->rate;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;

        if ($this->image) {
            $productId = $this->productIDGenerate('products');
            $imageName = $productId . '.' . $this->image->extension();
            $this->image->storeAs('assets/imgs/shop/products/', $imageName, 'public');
            $product->image = $imageName;
            if ($product->save()) {
                Log::info('Product image saved successfully: ' . $imageName);
            } else {
                Log::error('Error saving product image');
            }
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Product has been created successfully!');
    }
    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component', [
            'categories' => $categories,
            'products' => $products,
            'image' => $this->image,  // Make sure this line is included
        ]);
    }
}
