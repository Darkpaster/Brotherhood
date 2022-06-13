<?php

if(isset($_POST['mess']) && $_POST['mess'] != "" && $_POST['mess'] != " ")
{	
	session_start();
	
	$mess = $_POST['mess'];
	
	$login = $_SESSION['login'];
	
	$nickname = $_SESSION['nickname'];
	
	if ($_SESSION['check']) {
		include("../bd.php");
	}else{
		include("bd.php");
	}
if($nickname != ''){
    $res = mysqli_query($connection, "INSERT INTO `messages` (`login`, `nickname`, `message`) VALUES ('$login', '$nickname', '$mess')");
}else{
    $res = mysqli_query($connection, "INSERT INTO `messages` (`login`, `message`) VALUES ('$login', '$mess')");
}
	
	
}
?>