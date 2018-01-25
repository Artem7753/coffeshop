<?php
session_start();
if($_SESSION['active'] == 0)
	header("Location: ../models/come.php");
include_once ('../models/function.php');
$controller = new Base();
$act = $controller->IsActive();
if ($act == 1){
	$headmas = array('online'=>'⚫ ','link'=>'../models/exit.php','str'=>'Выйти');
}
else {
	$headmas = array('online'=>'⚪ ','link'=>'../controller/C_come.php','str'=>'Войти');
}
$controller->ConnectCSS();
$controller->TwigLoad('header.tmpl',$headmas,'../templates');
$userId = $_SESSION['user'];
$userInfo = $controller->Query("SELECT * FROM `Пользователи` WHERE id = $userId");
$admin = $controller->IsAdmin();
if($_SESSION['active'] == 1){
	if($admin == 1){
		$allOrder = $controller->Query("SELECT `Пользователи`.`Логин`,`Пользователи`.`Телефон`,`Пользователи`.`АдресДоставки`,`Статусы заказов`.`Статус`,`Товары`.`МаленькоеФото`,`Товары`.`Название`,`Товары`.`КраткоеОписание` FROM `Заказы` INNER JOIN `Пользователи` INNER JOIN `Статусы заказов` INNER JOIN `Товары` ON `Заказы`.`Пользователь` = `Пользователи`.`id` AND `Заказы`.`Статус` = `Статусы заказов`.`id` AND `Заказы`.`id товара` = `Товары`.`id` WHERE 1");
	}
	$userOrder =  $controller->Query("SELECT `Пользователи`.`id`,`Статусы заказов`.`Статус`,`Товары`.`МаленькоеФото`,`Товары`.`Название`,`Заказы`.`Количество` FROM `Заказы` INNER JOIN `Пользователи` INNER JOIN `Статусы заказов` INNER JOIN `Товары` ON `Заказы`.`Пользователь` = `Пользователи`.`id` AND `Заказы`.`Статус` = `Статусы заказов`.`id` AND `Заказы`.`id товара` = `Товары`.`id` WHERE `Пользователи`.`id` = $userId");
	$controller->TwigLoad('admin.tmpl',array('user'=>$userInfo[0],'userOrder'=>$userOrder,'admin'=>$admin,'allOrder'=>$allOrder),'../templates');
}

