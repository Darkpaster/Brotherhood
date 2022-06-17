<?php
session_start();
include("../userCounter.php");
include("Downloads.html");	

if ($_SESSION['login'] != ''){
$_SESSION['check'] = true;
include("../chat.php"); 
}
?>