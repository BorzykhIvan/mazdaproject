<?php

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$password= filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);


$password = md5($password."asdfjhbj3th4k3");

$mysql = new mysqli('localhost','root','','mabaza');

$result = $mysql->query("SELECT * FROM `users` WHERE `email`= '$login' AND `password` = '$password'");

$user = $result->fetch_assoc();
if(($user) == false) {
    echo "error";
    exit();
}

setcookie('user', $user['name'],time()+ 3600, "/");

$mysql->close();

header('Location: main.php');

?>
