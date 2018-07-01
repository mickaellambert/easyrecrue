<?php

namespace Util;

class Date
{
    const FORMAT_DEFAULT = 'Y-m-d h:m:s';

    public static function is_date_between_two_dates($date, $start_date, $end_date)
    {
        return (($date >= $start_date) && ($date <= $end_date));
    }
}