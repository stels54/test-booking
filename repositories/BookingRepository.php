<?php

namespace app\repositories;

use app\entities\Booking;

class BookingRepository
{
    public function getCountByCategoryAndDates($categoryId, $dateFrom, $dateTo)
    {
        return Booking::find()
            ->where(['room_category_id' => $categoryId])
            ->andWhere([
                'or',
                [
                    'and',
                    ['<=', 'date_from', $dateFrom],
                    ['>=', 'date_to',  $dateFrom]
                ],
                [
                    'and',
                    ['<=', 'date_from', $dateTo],
                    ['>=', 'date_to',  $dateTo]
                ]
            ])
            ->count();
    }

    public function save(Booking $booking): void
    {
        if (!$booking->save(false)) {
            throw new \RuntimeException('Saving error.');
        }
    }
}