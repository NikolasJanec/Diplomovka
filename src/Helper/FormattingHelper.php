<?php


namespace App\Helper;


abstract class FormattingHelper
{

    /**
     * @param \DateTime $datetime
     * @param string $format
     * @param string $timezone
     * @return null|string
     */
    public static function formatDateTime($datetime, $format = DATE_ISO8601, $timezone = 'UTC')
    {
        $formatted 				= null;
        if ($datetime instanceof \DateTime)
        {
            $datetime->setTimezone(new \DateTimeZone($timezone));
            $formatted 			= $datetime->format($format);
        }
        return $formatted;
    }

}