<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    use WithPagination;
    public function deleteCategoryConfirmation($category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $category->delete();
            session()->flash('message', 'Category has been deleted successfully!');
        } else {
            session()->flash('message', 'Category not found!');
        }
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(10);
        // dd($categories->pluck('id'));
        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}
