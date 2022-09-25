<?php

class Date
{

    static function getdate()
    {
        $tz = new DateTimeZone("Asia/Colombo");
        $t = new DateTime();
        $t->setTimezone($tz);
        $date_time = $t->format("Y-m-d H:i:s");
        return $date_time;
    }
}
