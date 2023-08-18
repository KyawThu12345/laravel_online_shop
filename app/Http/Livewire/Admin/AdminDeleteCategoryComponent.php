<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class AdminDeleteCategoryComponent extends Component
{
    public $category_id;
    public $name;
    public $slug;
    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }
    public function deleteCategory()
    {
        $category = Category::find($this->category_id);
        if ($category) {
            $category->delete();
            session()->flash('message', 'Category has been deleted successfully!');
        } else {
            session()->flash('message', 'Category not found!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-delete-category-component');
    }
}
