<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewUser extends Mailable
{
    use Queueable, SerializesModels;

  
    
    protected $user;
    protected $sponsor;

    public function __construct($user, $sponsor)
    {
        $this->user = $user;
        $this->sponsor = $sponsor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome_new_user', ["user" => $this->user, "sponsor"=>$this->sponsor]);
    }
}
