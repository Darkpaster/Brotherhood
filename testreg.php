<?php
session_start();

include('bd.php');

$message_error;

if (isset($_POST['login'])) {
 $login = $_POST['login']; 

if ($login == '') {
 unset($login);
} 
}

if (isset($_POST['password'])) { 
    $password = $_POST['password']; 
    if ($password == '') { 
        unset($password);
    } 
}

if (empty($login) or empty($password)) {
    if (isset($_POST['login'])) {
        $test = false;
    $message_error = 'Ты не ввёл логин или пароль.';

    }
    } else {


     
 
$result = mysqli_query($connection, "SELECT * FROM accounts WHERE login = '$login'");

    $myrow = mysqli_fetch_array($result);

    if (empty($myrow['password'])){
        $test = false;
     $message_error = 'Введённый логин неверный.';

     

    }
    else {
  
    if ($myrow['password'] == $password) {
    
    $_SESSION['id'] = $myrow['id'];
    $_SESSION['password'] = $myrow['password'];
    $_SESSION['nickname'] = $myrow['nickname'];
    $_SESSION['login'] = $myrow['login'];
   
   // setcookie("sessionok", $myrow['login'], time()+3600, "/");
   // setcookie("id", $myrow['id'], time()+3600, "/");
   // setcookie("nickname", $myrow['nickname'], time()+3600, "/");
   // setcookie("password", $myrow['password'], time()+3600, "/");

    header('Location: index.php');
    
    }
    else {
        $test = false;
     $message_error = 'Введённый пароль неверный.';

    }
    }
    }
include("Ru/Sign_in.html");
?>