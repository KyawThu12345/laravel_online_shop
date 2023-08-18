<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHomeSliderComponent extends Component
{
    use WithPagination;
    public function deleteSlide($slider_id)
    {
        $slide = HomeSlider::find($slider_id);
        if ($slide) {
            $slide->delete();
            session()->flash('message', 'Slider has been deleted successfully!');
        } else {
            session()->flash('message', 'Slider not found!');
        }
    }
    public function render()
    {
        $slides = HomeSlider::orderBy('created_at', 'ASC')->get();
        return view('livewire.admin.admin-home-slider-component', ['slides' => $slides]);
    }
}
