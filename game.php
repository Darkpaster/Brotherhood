<?php
session_start();
include("game.html");
if($_SESSION["login"] != ""){
$_SESSION['check'] = false;
include("chat.php");
}
?>