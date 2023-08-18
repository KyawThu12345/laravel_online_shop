<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Logout extends Component
{
    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
