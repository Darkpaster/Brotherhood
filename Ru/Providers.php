<?php
session_start();
include("userCounter.php");
include("Providers.html");	

if ($_SESSION['login'] != ''){
	$_SESSION['check'] = true;
include("../chat.php"); 
}
?>