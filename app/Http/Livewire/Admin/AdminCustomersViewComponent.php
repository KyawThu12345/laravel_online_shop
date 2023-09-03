<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminCustomersViewComponent extends Component
{
    public function render()
    {

        $customers = DB::table('users')->where('utype', '=', 'USR')->get();
        return view('livewire.admin.admin-customers-view-component', ['customers' => $customers]);
    }
}
