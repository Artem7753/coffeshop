<?php
include_once ('config.php');
$res = mysqli_query($link,"SELECT * FROM Товары");
$colprod = mysqli_num_rows($res);
if(isset($_POST['clear'])){
	for($i = 1;$i <= $colprod;$i++){
		setcookie("product".$i,"", time() - 3600,"/");
	}
}
header("Location: ../controller/C_catalog.php");
