<?php
session_start();


if ($_COOKIE['sessionok'] == '') {
    header('Location: ../index.php');
} else {
    
}

$test = false;

 include('../bd.php');

if (isset($_POST['nickname'])) {
$nickname = $_POST['nickname'];
 }

if (isset($_POST['password'])) {
$password = $_POST['password'];

if (empty($password)) {
    $test = false;
	$message_error = 'Пароль не может быть пустым.';
} else {
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);

    $sql = " UPDATE accounts SET nickname = '$nickname', password = '$password' WHERE login = '$_COOKIE[sessionok]'";

    $result2 = mysqli_query($connection, "SELECT * FROM accounts WHERE login = '$_COOKIE[sessionok]'");

    $info_array = mysqli_fetch_array($result2);

        $nickname = $info_array['nickname'];
        $password = $info_array['password'];
       
    if (mysqli_query($connection, $sql)) {
        unset($_COOKIE['nickname']);
        unset($_COOKIE['password']);
        setcookie('nickname', $nickname, time()+3600, '/');
        setcookie('password', $password, time()+3600, '/');
        $test = true;
    	$message_successful = 'Информация успешно обновлена.';
    } else {
        $test = false;
    	$message_error = 'Скажи Егору, если видишь это.';
    }

}
}
$result2 = mysqli_query($connection, "SELECT * FROM accounts WHERE login = '$_COOKIE[sessionok]'");

    $info_array = mysqli_fetch_array($result2);
setcookie('nickname', $info_array['nickname'], time()+3600, '/');
setcookie('password', $info_array['password'], time()+3600, '/');

$_COOKIE['nickname'] = $info_array['nickname'];
$_COOKIE['password'] = $info_array['password'];


include("Profile.html");


?>