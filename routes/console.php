<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Example command to display an inspiring quote
// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

// Command to send GST reminders
Artisan::command('gst:send-reminder', function () {
    $this->call('gst:send-reminder');
})->purpose('Send GST creation reminders to all users');
