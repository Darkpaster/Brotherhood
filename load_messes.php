<?php

if ($_SESSION['check']) {
		include("../bd.php");
	}else{
		include("bd.php");
	}

$res = mysqli_query($connection, "SELECT * FROM `messages` ORDER BY `id` ");


while($d = mysqli_fetch_array($res))
{	
// 	$result = mysqli_query($connection, "SELECT * FROM accounts WHERE login = '$d[login]'");

// 	$userAcc = mysqli_fetch_array($result);

 	if($d['nickname'] != '') {
 		echo "<b><font color='blue'>" . $d['nickname'] . ":&nbsp;</font></b>" . $d['message'] . "<br>"; 
 	 } else {
	 	echo "<b><font color='blue'>" . $d['login'] . ":&nbsp;</font></b>" . $d['message'] . "<br>";
	 }
	
	
}
?>