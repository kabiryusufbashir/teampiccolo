<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Newsletter;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;
    
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@teampiccolo.com')
                    ->with([
                        'emails' => $this->newsletter->email,
                    ])
                    ->subject('Team Piccolo NewsLetter')
                    ->view('emails.newslettersubscribe');
    }
}
