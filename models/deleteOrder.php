<?php
include_once( '../models/function.php' );
$controller = new Base();
$goods = $controller->GetBasketGoods();
if(isset($_GET['a'])){
	$a = $_GET['a'];
	for($i = 0;$i < count($goods);$i++){
		if ($goods[$i]['id'] == $a && $goods[$i][6] > 1){
			$goods[$i][6]--;
			setcookie("product".$a,$goods[$i][6], time() + 3600,"/");
		}
		else if ($goods[$i]['id'] == $a && $goods[$i][6] == 1){
			setcookie("product".$a,"", time() - 3600,"/");
	}
	};
}
header("Location: ../controller/C_basket.php");