<?php
session_start();
$mysql = new mysqli('localhost','root','','mabaza');

$uploadfolder = 'car/';
$uploadfile = $uploadfolder . basename($_FILES['car']['name']);

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['model'], $_POST['nr_rejestracyjny'], $_POST['rok'], $_POST['rodzaj'], $_POST['typ'], $_FILES['car'])) {
        $model = $_POST['model'];
        $nr_rejestracyjny = $_POST['nr_rejestracyjny'];
        $rok = $_POST['rok'];
        $rodzaj = $_POST['rodzaj'];
        $typ = $_POST['typ'];
        $car = $_FILES['car'];
        move_uploaded_file($_FILES['car']['tmp_name'], $uploadfile);
        $result = mysqli_query($mysql, "INSERT INTO cars VALUES (NULL,'$model','$nr_rejestracyjny','$rok','$rodzaj','$typ','$uploadfile')");
    }
}
$mysql->close();
header('Location: form.php');

?>