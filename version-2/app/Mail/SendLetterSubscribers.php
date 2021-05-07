<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Weeklyletter;

class SendLetterSubscribers extends Mailable
{
    use Queueable, SerializesModels;

    public $weeklyletter;
    
    public function __construct(Weeklyletter $weeklyletter)
    {
        $this->weeklyletter = $weeklyletter;
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
                        'title' => $this->weeklyletter->title,
                        'content' => $this->weeklyletter->content,
                    ])
                    ->subject($this->weeklyletter->title)
                    ->view('emails.sendweeklyletter');
    }
}
