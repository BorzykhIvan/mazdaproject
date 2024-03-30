<?php
$surname = filter_var(trim($_POST['surname']),
FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$password= filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login)<7 || mb_strlen($login) > 90 ){
    echo "Nieprawidlowa dlugosc";
    exit();
}
$password = md5($password."asdfjhbj3th4k3");

$mysql = new mysqli('localhost','root','','mabaza');

$mysql->query("INSERT INTO  `users` (`surname`,`email`,`password`) VALUES ('$surname','$login','$password')");

$mysql->close();

header('Location: login.php');

?>

