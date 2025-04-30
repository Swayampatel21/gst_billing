<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GstBillNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $gstBill;
    public $party;

    public function __construct($gstBill, $party)
    {
        $this->gstBill = $gstBill;
        $this->party = $party;
    }

    public function build()
    {
        return $this->subject('New GST Bill Notification')
                    ->view('emails.gst_bill_notification')
                    ->with([
                        'gstBill' => $this->gstBill,
                        'party' => $this->party,
                    ]);
    }
}