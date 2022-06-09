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


if ($_COOKIE['sessionok'] == '') {
	
} else {
	setcookie("sessionok", $_COOKIE['sessionok'], time()+3600, '/');
	setcookie('id', $_COOKIE['id'], time()+3600, '/');
	setcookie('nickname', $_COOKIE['nickname'], time()+3600, '/');
	setcookie('password', $_COOKIE['password'], time()+3600, '/');
}

//$connection = mysqli_connect('localhost', 'id17956435_lightpaster', '@%mW-OoeI#idzv2X', 'id17956435_accounts');


?>