<?php
session_start();

if ($_SESSION['login'] == '') {
    header('Location: ../index.php');
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
    $message_error = 'пароль не мошет бытт пустым(';
} else {
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    

    $sql = " UPDATE accounts SET nickname = '$nickname', password = '$password' WHERE login = '$_SESSION[login]'";

    $result2 = mysqli_query($connection, "SELECT * FROM accounts WHERE login = '$_SESSION[login]'");

    $info_array = mysqli_fetch_array($result2);

        $nickname = $info_array['nickname'];
        $password = $info_array['password'];
    if (mysqli_query($connection, $sql)) {
        unset($_SESSION['nickname']);
        unset($_SESSION['password']);
        $_SESSION['password'] = $password;
        $_SESSION['nickname'] = $nickname;
        $test = true;
        $message_successful = 'гатово)';
    } else {
        $test = false;
        $message_error = 'скаши Егору есле видишь ето(';
    }

}
}

include("Profile.html");
?>