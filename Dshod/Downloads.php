<?php
session_start();
include("Downloads.html");	

if ($_SESSION['login'] != ''){
	$_SESSION['check'] = true;
include("../chat.php"); 
}
?>