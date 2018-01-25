<?
include_once('config.php');
$res = mysqli_query($link,"SELECT * FROM Товары");
$colprod = mysqli_num_rows($res);
if(isset($_POST['clear'])){
	for($i = 1;$i <= $colprod;$i++){
		setcookie("product".$i,"", time() - 3600);
	}
}
echo "<h1>Корзина</h1>";
for($i = 1;$i <= $colprod;$i++){
	if(isset($_COOKIE['product'.$i])){
		$quer = mysqli_query($link,"SELECT * from Товары where id=".$i);
		$data = mysqli_fetch_array($quer);
		echo "<div class='basket-product'>";
		echo "<img class='image-basket' src='../site/".$data['МаленькоеФото']."'>";
		echo "<h2 class='head-product'>".$data['Название']."</h2>";
		echo "<h2 class='head-product'>Количество:".$_COOKIE['product'.$i]."<br></h2>";
		echo "</div>";
		echo "<hr>";
	}
	
	
}?>
<br><br>
<a href="../controller/C_catalog.php">Назад!</a>
<br><br>
<link rel="stylesheet" href="../site/use.css">
<form action="" method="post">
	<input type="submit" name="clear" value='Очистить корзину'>
</form>