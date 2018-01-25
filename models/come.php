<?
include_once('config.php');
session_start();
if(isset($_POST['come'])){
	$query = "SELECT id FROM Пользователи WHERE Логин = '".$_POST['log']."'&& Пароль =  '".$_POST['pas']."'";
	$result = mysqli_query($link,$query);
	$resmas = [];
	while($res = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($resmas,$res);
	}
		if(count($resmas)> 0){
			$_SESSION['active'] = 1;
			$_SESSION['user'] = $resmas[0]['id'];
			header("Location: ../controller/C_catalog.php");
        }
	else {
		$_SESSION['active'] = 0;
		echo "Возможно вы ошиблись!Попробуйте еще раз!";
    }

}

