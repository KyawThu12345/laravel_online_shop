<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public function contact_mail_send(Request $request)
    {
        Mail::to('minkyawt733@gmail.com')->send(new ContactMail($request));
        return redirect('contact');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
