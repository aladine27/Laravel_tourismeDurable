<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ReservationReminder;
use App\Models\RestaurantReservation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendReservationReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email to users an hour before their reservation';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Get all future reservations from the database (where the reservation time is at least 1 hour in the future)
        $reservations = RestaurantReservation::where('reservation_date', '>', now())
                                              ->get();

        // Check if reservations exist
        if ($reservations->isEmpty()) {
            Log::info('No future reservations found for reminder at ' . now()->toDateTimeString());
            $this->info('No future reservations found to send reminders.');
            return;
        }

        // Loop through the reservations and send reminder emails
        foreach ($reservations as $reservation) {
            try {
                // Calculate the delay (in seconds) until 1 hour before the reservation
                $reservationTime = $reservation->reservation_date;
                $delay = $reservationTime->subHour()->diffInSeconds(now());

                // Ensure delay is positive and only schedule emails for reservations that are more than 1 hour away
                if ($delay > 0) {
                    // Queue the reminder email to be sent one hour before the reservation
                    Mail::to($reservation->user->email)->later(now()->addSeconds($delay), new ReservationReminder($reservation));

                    // Log success
                    Log::info('Reminder queued for ' . $reservation->user->email . ' for reservation at ' . $reservation->reservation_date);

                    // Console output
                    $this->info('Reminder queued for ' . $reservation->user->email);
                } else {
                    // Log if the reservation is too soon to send a reminder
                    Log::warning('Reservation for ' . $reservation->user->email . ' is too soon to send a reminder: ' . $reservation->reservation_date);
                    $this->warn('Reservation is too soon to send a reminder for user ' . $reservation->user->email);
                }
            } catch (\Exception $e) {
                // Log error if sending email fails
                Log::error('Failed to queue reminder for ' . $reservation->user->email . ' due to: ' . $e->getMessage());

                // Console output for failure
                $this->error('Failed to queue reminder for ' . $reservation->user->email);
            }
        }
    }
}
