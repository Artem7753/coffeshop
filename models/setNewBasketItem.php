<?
$a = $_GET['a'];
if(isset($_POST['cookbut']))
	if(isset($_COOKIE['product'.$a]))
	{
		$col = $_COOKIE['product'.$a] +1;
		setcookie("product".$a,$col, time() + 3600,"/");
	}
	else	
	{
		$col = 1;
		setcookie("product".$a,$col, time() + 3600,"/");
	}
header("Location: ../controller/C_catalog.php");


