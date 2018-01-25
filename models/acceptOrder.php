<?php
session_start();
include_once( '../models/function.php' );
include_once ('../models/config.php');
$controller = new Base();
$goods = $controller->GetBasketGoods();
$user = $_SESSION['user'];
if($_SESSION['active'] == 1){
	for ($i = 0;$i<count($goods);$i++){
		$query = "INSERT INTO `Заказы`(`Пользователь`, `id товара`, `количество`, `Статус`) VALUES (".$user.",".$goods[$i]['id'].",".$goods[$i][6].",1)";
		$result = mysqli_query($link,$query);
	}

	$res = mysqli_query($link,"SELECT * FROM Товары");
	$colprod = mysqli_num_rows($res);
		for($i = 1;$i <= $colprod;$i++)
			setcookie("product".$i,"", time() - 3600,"/");

	}
else{
	header("Location: ../controller/C_come.php");
}
header("Location: ../controller/C_catalog.php");