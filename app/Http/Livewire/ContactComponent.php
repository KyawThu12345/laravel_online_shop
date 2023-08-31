<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public function contact_mail_send(Request $request)
    {
        // dd($request->all());
        Mail::to('minkyawt733@gmail')->send(new ContactMail($request));
        return redirect('contact');
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}
