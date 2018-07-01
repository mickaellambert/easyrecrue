<?php

namespace Util;

class Timezone
{
    const LOCALE_TO_TIMEZONE = array(
        "fr_FR" => "Europe/Paris",
        "fr_CA" => "America/Montreal",
        "it_IT" => "Europe/Rome",
        "pt_PT" => "Europe/Lisbon",
        "pt_BR" => "America/Sao_Paulo"
    );

    const DEFAULT_TIMEZONE = "Asia/Tokyo";

    public static function set_timezone_by_locale($locale)
    {
        if (!array_key_exists($locale, self::LOCALE_TO_TIMEZONE)) {
            date_default_timezone_set(self::DEFAULT_TIMEZONE);
        }

        date_default_timezone_set(self::LOCALE_TO_TIMEZONE[$locale]);
    }
}