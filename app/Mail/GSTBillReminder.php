<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GSTBillReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $userName;
    public $date;

    public function __construct($userName, $date)
    {
        $this->userName = $userName;
        $this->date = $date;
    }

    public function build()
    {
        return $this->subject('Reminder: Generate Your GST Bill')
                    ->view('emails.gst_bill_reminder')
                    ->with([
                        'userName' => $this->userName,
                        'date' => $this->date,
                    ]);
    }
}