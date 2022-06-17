<?php
session_start();
$_SESSION['nickname'] = '';
$_SESSION['login'] = '';
$_SESSION['password'] = '';
include("userCounter.php");

// unset($_COOKIE['sessionok']);
// unset($_COOKIE['password']);
// unset($_COOKIE['id']);
// unset($_COOKIE['nickname']);
// setcookie('sessionok', null, -1, '/');
// setcookie('password', null, -1, '/');
// setcookie('id', null, -1, '/');
// setcookie('nickname', null, -1, '/');


$str_time = '2021-11-17 14:00:00';
$start_time = strtotime($str_time);
$time_now = time();
$difference_seconds = $time_now - $start_time;
$difference_days = round($difference_seconds / 60 / 60 / 24);
// $difference_days = $difference_seconds / 60 / 60 / 24;
round($difference_seconds / 60 / 60 / 24);

include("firstPage2.html")
?>