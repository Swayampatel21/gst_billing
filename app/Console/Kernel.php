<?php
     namespace App\Console;
     use Illuminate\Console\Scheduling\Schedule;
     use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

     class Kernel extends ConsoleKernel
     {
         protected $commands = [
             \App\Console\Commands\SendGSTBillReminder::class,
         ];

         protected function schedule(Schedule $schedule)
         {
             $schedule->command('gstbill:reminder')->dailyAt('18:31');
         }

         protected function commands()
         {
             $this->load(__DIR__.'/Commands');
             require base_path('routes/console.php');
         }
     }