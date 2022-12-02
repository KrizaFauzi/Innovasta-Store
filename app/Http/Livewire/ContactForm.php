<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $success;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required|min:5',
    ];

    public function submitForm()
    {
        $this->validate();

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
    }

    public function contactFormSubmit()
    {
        $contact->validate();

        Main::send('email',
        array(
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            ),
            function($message) {
                $message->from('your_email@your_domain.com');
                $message->to('your_email@your_domain.com', 'Bobby')->subject('Your Site Contect Form');
            }
        );

        $this->reset(['name', 'email', 'message']);
        $this->success = 'Your inquiry has been submitted successfully!';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
