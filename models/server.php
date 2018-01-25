<?
include('config.php');
if(isset($_POST['subm'])){
	$query = "INSERT INTO `Отзывы`(`НомерТовара`, `Текст` , `Имя`) VALUES (".$_POST['hid'].", '".$_POST['comment']."','".$_POST['name']."')";
	$insert = mysqli_query($link,$query);
	if ($insert = 'true'){
		header("Location: ../controller/C_product.php?a=".$_POST['hid']);
    }else{
		header("Location: ../controller/C_product.php?a=".$_POST['hid']);
    }
}?>
