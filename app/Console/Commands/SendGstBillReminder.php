<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\GstBillReminderMail;

class SendGstBillReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gst:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send monthly GST bill reminder email to all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new GstBillReminderMail($user));
        }

        $this->info('GST bill reminder emails sent successfully.');

        return 0;
    }
}
