<?php
 

if ($_COOKIE['sessionok'] == '') {
    
} else {
    setcookie("sessionok", $_COOKIE['login'], time()+3600, '/');
    header('Location: ../index.php');
}

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
    $message_error = 'Ты не ввёл логин или пароль.';

    

     //header("Refresh: 0");
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
        $message_error = 'Пользователь с таким логином уже есть.';
        //header("Refresh: 0");
    

    } else {
        $result2 = mysqli_query($connection, "INSERT INTO accounts (login, password) VALUES('$login','$password')");
           if ($result2 == 'TRUE') {
            
            $test = true;
            $message_successful = 'Успешная регистрация. <br>'  . 'Твой логин - ' . $login . ', твой пароль - ' . $password . '.';
           } else {
            $test = false;
            $message_error = 'Скажи Егору, если видишь это.';
    


           }
    }
}
 

include("Ru/Sign_up.html");

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