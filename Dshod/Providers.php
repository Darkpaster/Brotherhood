<?php
session_start();
include("Providers.html");	

if ($_SESSION['login'] != ''){
	$_SESSION['check'] = true;
include("../chat.php"); 
}
?>