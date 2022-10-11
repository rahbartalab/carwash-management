<?php

function sum_to_time($fTime, $sTime): string
{
    $secs = strtotime($sTime) - strtotime("00:00:00");
    return date("H:i:s", strtotime($fTime) + $secs);
}
