<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Contact;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contact->email)
                    ->with([
                        'name' => $this->contact->name,
                        'email' => $this->contact->email,
                        'phone' => $this->contact->phone,
                        'enquiry' => $this->contact->enquiry,
                    ])
                    ->subject('Team Piccolo Enquiry')
                    ->view('emails.contact');
    }
}
