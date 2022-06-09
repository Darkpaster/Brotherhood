<?php

session_start();

include("Downloads.html");	

if ($_COOKIE['sessionok'] == '') {
	
} else {
	setcookie("sessionok", $_COOKIE['sessionok'], time()+3600, '/');
    setcookie('id', $_COOKIE['id'], time()+3600, '/');
    setcookie('nickname', $_COOKIE['nickname'], time()+3600, '/');
    setcookie('password', $_COOKIE['password'], time()+3600, '/');
}

//$connection = mysqli_connect('localhost', 'id17956435_lightpaster', '@%mW-OoeI#idzv2X', 'id17956435_accounts');


?>