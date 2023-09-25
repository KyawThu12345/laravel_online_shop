<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyAccountComponent extends Component
{
    public function redirectOrders()
    {
        return redirect()->route('user.orders');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.my-account-component');
    }
}
