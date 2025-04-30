<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GSTBillGenerated extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $date;
    public $pdfContent;

    public function __construct($userName, $date, $pdfContent)
    {
        $this->userName = $userName;
        $this->date = $date;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->view('emails.gst_bill_generated')
                    ->subject('Your GST Bill has been generated')
                    ->attachData($this->pdfContent, 'GST_Bill_' . $this->date . '.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->with([
                        'userName' => $this->userName,
                        'date' => $this->date,
                    ]);
    }
}
