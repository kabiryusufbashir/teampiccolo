<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Clientsendmail;

class SendMailClient extends Mailable
{
    use Queueable, SerializesModels;

    public $clientsendmail;
    
    public function __construct(Clientsendmail $clientsendmail)
    {
        $this->clientsendmail = $clientsendmail;
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
                        'content' => $this->clientsendmail->message,
                    ])
                    ->subject('Team Piccolo Message')
                    ->view('emails.sendclientmail');
    }
}
