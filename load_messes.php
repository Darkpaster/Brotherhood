<?php

include("bd.php");

if ($connection) {
	echo 'bd works from load';
} else {
	echo 'bd dont works from load';
}

$res = mysqli_query($connection, "SELECT * FROM `messages` ORDER BY `id` ");

while($d = mysql_fetch_array($res))
{	
	echo "<b><font color='orange'>" . $d['login'] . ":&nbsp;</font></b>" . $d['message'] . "<br>";
}
?>