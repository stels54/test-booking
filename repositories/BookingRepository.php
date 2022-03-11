<?php

namespace app\repositories;

use app\entities\Booking;

class BookingRepository
{
    public function save(Booking $booking): void
    {
        if (!$booking->save(false)) {
            throw new \RuntimeException('Saving error.');
        }
    }
}