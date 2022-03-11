<?php

namespace app\helpers;

class DatetimeHelper
{
    public static function validateDateInterval($firstDate, $secondDate) : bool
    {
        return new \Datetime($firstDate) <= new \Datetime($secondDate);
    }
}