<?php
session_start();

$str_time = '2021-11-17 14:00:00';
$start_time = strtotime($str_time);
$time_now = time();
$difference_seconds = $time_now - $start_time;
$difference_days = round($difference_seconds / 60 / 60 / 24);
// $difference_days = $difference_seconds / 60 / 60 / 24;
round($difference_seconds / 60 / 60 / 24);

include("firstPage2.html");	

?>