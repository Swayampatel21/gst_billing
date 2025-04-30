<?php
     namespace App\Console\Commands;
     use Illuminate\Console\Command;
     use App\Models\PartiesModel;
     use Illuminate\Support\Facades\Mail;
     use App\Mail\GSTBillReminder;
     use Illuminate\Support\Facades\Log;

     class SendGSTBillReminder extends Command
     {
         protected $signature = 'gstbill:reminder';
         protected $description = 'Send reminder emails to parties for GST bill generation';

         public function handle()
         {
             $parties = PartiesModel::whereNotNull('email')->get();
             if ($parties->isEmpty()) {
                 Log::info('No parties with valid email addresses found.');
                 $this->info('No parties with valid email addresses found.');
                 return;
             }

             foreach ($parties as $party) {
                 try {
                     Mail::to($party->email)->send(new GSTBillReminder($party->full_name, date('d-m-Y')));
                     Log::info("Reminder email sent to {$party->full_name} ({$party->email})");
                     $this->info("Reminder email sent to {$party->full_name} ({$party->email}) successfully.");
                 } catch (\Exception $e) {
                     Log::error("Failed to send reminder email to {$party->email}. Error: " . $e->getMessage());
                     $this->error("Failed to send reminder email to {$party->email}.");
                 }
             }
             $this->info('GST bill reminder emails processed.');
         }
     }