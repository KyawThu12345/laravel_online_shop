<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminDeleteSliderComponent extends Component
{
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $category_text;
    public $image;
    public $slider_id;

    public function mount($slider_id)
    {
        $slide = HomeSlider::find($slider_id);
        $this->top_title = $slide->top_title;
        $this->title = $slide->title;
        $this->sub_title = $slide->sub_title;
        $this->offer = $slide->offer;
        $this->link = $slide->link;
        $this->category_text = $slide->category_text;
        $this->image = $slide->image;
        $this->slider_id = $slider_id;
    }


    public function deleteSlide()
    {
        $slide = HomeSlider::find($this->slider_id);
        if ($slide) {
            $slide->delete();
            session()->flash('message', 'Slider has been deleted successfully!');
            return redirect()->route('admin.home.slider');
        } else {
            session()->flash('message', 'Slider not found!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-delete-slider-component');
    }
}
