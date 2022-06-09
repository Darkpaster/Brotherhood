<?php
if(isset($_POST['mess']) && $_POST['mess'] != "" && $_POST['mess'] != " ")
{	
	session_start();
	
	$mess = $_POST['mess'];
	
	$login = $_COOKIE['sessionok'];
	
	include("bd.php");

	if ($connection) {
	echo 'bd works from add_mess';
	} else {
	echo 'bd dont works from add_mess';
	}
	
	$res = mysqli_query($connection, "INSERT INTO `messages` (`login`, `message`) VALUES ('$login', '$mess')");
}
?>