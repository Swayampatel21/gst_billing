<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Welcome to GST Billing System!')
                    ->view('emails.welcome')
                    ->with([
                        'name' => $this->user->name,
                        'email' => $this->user->email
                    ]);
    }
}