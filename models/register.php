<?php
include_once ('config.php');
$num = $_POST['num'];
$login = $_POST['login'];
$pass = $_POST['password'];
$adr = $_POST['adress'];
$query = "INSERT INTO `Пользователи`(`Логин`, `Пароль`, `Телефон`, `АдресДоставки`) VALUES ('".$login."','".$pass."','".$num."','".$adr."')";
$result = mysqli_query($link,$query);
if($result){
	header("Location: ../controller/C_catalog.php");
}
else echo 'ошибка';