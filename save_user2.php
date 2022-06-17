<?php
include("userCounter.php");
include('bd.php');


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
    $message_error = 'нада все паля заполнитт(';

    
    }
} else {
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

    $result = mysqli_query($connection, "SELECT id FROM accounts WHERE login = '$login'");

    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        $test = false;
        $message_error = 'ктота уше зарегался пад таким логинам(';
        
    } else {
        $result2 = mysqli_query($connection, "INSERT INTO accounts (login, password) VALUES('$login','$password')");
           if ($result2 == 'TRUE') {
            
            $message_successful = 'ты зарегался уехухухухухуух) <br>' . 'логин ' . $login . ', пароль ' . $password;
           } else {
            $test = false;
            $message_error = 'уаааааааааааааа( <br>' . 'скаши Егору если видишь это(';

           }
    }
}
include("Dshod/Sign_up.html");
// $resultt = mysqli_query($connection, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");

// if (mysqli_num_rows($resultt) == 0) {
//  if ($login == null || $password == null) {
//  echo 'Before you need enter password and login.';
//  } else {
//      echo 'Password or login is invalid.';
//  }
// } else {
//  echo 'Welcome back, ' . $login;
//  }
?>