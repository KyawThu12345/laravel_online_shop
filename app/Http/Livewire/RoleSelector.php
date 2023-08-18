<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RoleSelector extends Component
{
    public $role = 'user';
    public function render()
    {
        return view('livewire.role-selector');
    }
}
