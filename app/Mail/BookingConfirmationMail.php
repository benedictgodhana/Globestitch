<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->subject('Booking Confirmation')
                    ->view('emails.booking_confirmation')
                    ->with([
                        'name' => $this->booking->full_name,
                        'tripTitle' => $this->booking->trip->title,
                        'tripDate' => $this->booking->trip->start_date . ' - ' . $this->booking->trip->end_date,
                    ]);
    }
}
