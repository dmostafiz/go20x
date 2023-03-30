<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformNewLead extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $contact;

    public function __construct($user, $contact)
    {
        $this->user = $user;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // dd($this->user);
        return $this->markdown('emails.inform_new_lead', [
            "user" => $this->user,
            "contact" => $this->contact
        ]);
    }
}
