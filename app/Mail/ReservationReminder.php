<?php

namespace App\Mail;

use App\Models\RestaurantReservation; // Import the model to specify type hint
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The reservation instance.
     *
     * @var \App\Models\RestaurantReservation
     */
    public $reservation;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\RestaurantReservation $reservation
     */
    public function __construct(RestaurantReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Specify the subject and the email view
        return $this->subject('Reminder: Your Reservation is Coming Up')
                    ->view('emails.reservation_reminder')
                    ->with([
                        'reservation' => $this->reservation, // Pass the reservation data to the view
                    ]);
    }
}
