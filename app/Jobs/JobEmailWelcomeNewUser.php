<?php

namespace App\Jobs;

use App\Mail\WelcomeNewUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

// use Mail;

class JobEmailWelcomeNewUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $sponsor;


    public function __construct($user, $sponsor)
    {
        $this->user = $user;
        $this->sponsor = $sponsor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $email = new WelcomeNewUser($this->user, $this->sponsor);

        // dd($this->user);

        Mail::to($this->user->email)->send($email);
    }
}
