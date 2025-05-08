<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GstBillReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('GST Bill Reminder')
                    ->view('emails.gst_bill_reminder')
                    ->with([
                        'userName' => $this->user->name,
                        'reminderMessage' => 'Please check all your GST bills as per your request.',
                    ]);
    }
}
