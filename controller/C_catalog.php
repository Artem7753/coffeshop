<?php
include_once( '../models/function.php' );
$controller = new Base();
$act = $controller->IsActive();
if ($act == 1){
	$headmas = array('online'=>'⚫ ','link'=>'../models/exit.php','str'=>'Выйти');
}
else {
	$headmas = array('online'=>'⚪ ','link'=>'../controller/C_come.php','str'=>'Войти');
}
$controller->ConnectCSS();
$page = $controller->Page();
$res = $controller->Query("SELECT * FROM Товары LIMIT 0,".($_GET["page"]*12));
$controller->TwigLoad('header.tmpl',$headmas,'../templates');
$controller->TwigLoad('catalog.tmpl',array('resMas'=>$res,'page'=>$page),'../templates');
$controller->TwigLoad('footer.tmpl',[],'../templates');
