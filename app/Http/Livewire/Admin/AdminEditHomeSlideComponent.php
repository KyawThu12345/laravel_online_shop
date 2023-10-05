<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $category_text;
<<<<<<< HEAD

=======
>>>>>>> 3d5486bdc804e03d6b411aa5f3fcd2c038a37f7e
    public $image;
    public $slider_id;
    public $newImage;

    public function mount($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        $this->top_title = $slide->top_title;
        $this->title = $slide->title;
        $this->sub_title = $slide->sub_title;
        $this->offer = $slide->offer;
        $this->link = $slide->link;
        $this->category_text = $slide->category_text;
        $this->image = $slide->image;
        $this->slider_id = $slide->id;
    }

    public function updateSlide()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'category_text' => 'required'
        ]);

        $slide = HomeSlider::find($this->slider_id);
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
<<<<<<< HEAD

        $slide->link = $this->link;



=======
        $slide->link =  $this->link;
>>>>>>> 3d5486bdc804e03d6b411aa5f3fcd2c038a37f7e
        $slide->category_text = $this->category_text;
        if ($this->newImage) {
            unlink('assets/imgs/slider/' . $slide->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slider', $imageName);
            $slide->image = $imageName;
        }
        $slide->save();
        session()->flash('message', 'Slide has been updated!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slide-component');
    }
}
