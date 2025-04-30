<?php
namespace App\Http\Controllers;
use App\Models\PartiesModel;
use App\Models\EmailSchedule;
use Illuminate\Support\Facades\Mail;
use App\Mail\GSTBillReminder;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function sendReminderEmails(Request $request)
    {
        $token = $request->query('token');
        if ($token !== 'x7k9p2m8q3z') {
            Log::warning('Unauthorized attempt to send reminder emails.');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $currentTime = now()->format('H:i:s');
        $schedule = EmailSchedule::where('send_time', $currentTime)
                                ->where('is_active', true)
                                ->first();

        if (!$schedule) {
            Log::info("No active email schedule for time: {$currentTime}");
            return response()->json(['message' => 'No emails scheduled']);
        }

        $parties = PartiesModel::whereNotNull('email')->get();
        if ($parties->isEmpty()) {
            Log::info('No parties with valid emails.');
            return response()->json(['message' => 'No valid email recipients']);
        }

        $successCount = 0;
        $errorCount = 0;

        foreach ($parties as $party) {
            try {
                Mail::to($party->email)->send(new GSTBillReminder($party->full_name, now()->format('d-m-Y')));
                Log::info("Email sent to {$party->full_name} ({$party->email})");
                $successCount++;
            } catch (\Exception $e) {
                Log::error("Failed to send email to {$party->email}. Error: " . $e->getMessage());
                $errorCount++;
            }
        }

        return response()->json([
            'message' => 'Emails processed',
            'successful' => $successCount,
            'failed' => $errorCount,
            'time' => $currentTime,
        ]);
    }
}