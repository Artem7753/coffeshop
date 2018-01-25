<?php
include_once( '../models/function.php' );
$controller = new Base();
$goods = $controller->GetBasketGoods();
$controller->ClearBasket();
$controller->ConnectCSS();
$controller->TwigLoad('header.tmpl',[],'../templates');
$controller->TwigLoad('basket.tmpl',array('goods'=>$goods),'../templates');
$controller->TwigLoad('footer.tmpl',[],'../templates');