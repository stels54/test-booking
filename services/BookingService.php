<?php

namespace app\services;

use app\forms\BookingForm;
use app\repositories\BookingRepository;
use app\entities\Booking;
use app\repositories\RoomCategoryRepository;

class BookingService
{
    private $bookings;
    private $roomCategories;

    public function __construct(BookingRepository $bookings, RoomCategoryRepository $roomCategories)
    {
        $this->bookings = $bookings;
        $this->roomCategories = $roomCategories;
    }

    public function create(int $categoryId, BookingForm $form) : void
    {
        $roomCategory = $this->roomCategories->get($categoryId);
        $bookingsCount = $this->bookings->getCountByCategoryAndDates($categoryId, $form->date_from, $form->date_to);

        if ($roomCategory->rooms_count <= $bookingsCount) {
            throw new \DomainException('All rooms are booked');
        }

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