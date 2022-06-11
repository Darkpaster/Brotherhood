<?php
session_start();

// ini_get_all();
// $ini = ini_get_all();

//print_r(var_dump($ini));
// session_set_cookie_params(3600,"/");

$str_time = '2021-11-17 14:00:00';
$start_time = strtotime($str_time);
$time_now = time();
$difference_seconds = $time_now - $start_time;
$difference_days = round($difference_seconds / 60 / 60 / 24);
round($difference_seconds / 60 / 60 / 24);


// if ($_COOKIE['sessionok'] == 'test'){
// include("chat.php"); 
// }

include("firstPage.html");
?>