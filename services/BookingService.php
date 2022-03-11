<?php

namespace app\services;

use app\forms\BookingForm;
use app\repositories\BookingRepository;
use app\entities\Booking;

class BookingService
{
    private $bookings;

    public function __construct(BookingRepository $bookings)
    {
        $this->bookings = $bookings;
    }

    public function create(int $categoryId, BookingForm $form) : void
    {
        $booking = Booking::create(
            $categoryId,
            $form->date_from,
            $form->date_to,
            $form->customer_name,
            $form->customer_email
        );

        $this->bookings->save($booking);
    }
}