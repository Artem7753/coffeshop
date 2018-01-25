<?php
session_start();
include_once( '../models/function.php' );
$controller = new Base();
$controller->ConnectCSS();
$a = $controller->GetUrlParam('a');
$res = $controller->Query("SELECT * from Товары where id=".$a);
$res[0]['page'] = $a;
$_POST['CurPage'] = $a;
$act = $controller->IsActive();
if ($act == 1){
	$headmas = array('online'=>'⚫ ','link'=>'../models/exit.php','str'=>'Выйти');
}
else {
	$headmas = array('online'=>'⚪ ','link'=>'../controller/C_come.php','str'=>'Войти');
}
$controller->TwigLoad('header.tmpl',$headmas,'../templates');
$controller->TwigLoad('product.tmpl',$res[0],'../templates');
if ($act == 1){
	$resComment = $controller->Query("SELECT * FROM Отзывы Where НомерТовара =".$a);
	$controller->TwigLoad('comment.tmpl',array('resMas'=>$resComment,'page' => $a),'../templates');
}
$controller->BasketCookie();
$controller->TwigLoad('footer.tmpl',[],'../templates');