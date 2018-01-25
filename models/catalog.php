<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="use.css">
<?
include('config.php');
mysqli_query($link,"SET NAMES utf8");
$result = mysqli_query($link,"SELECT * FROM Товары");
while($data = mysqli_fetch_array($result)){
	echo "<a href='../models/product.php?a=".$data['id']."' class='cat-but'>";
	echo "<article class='article'> ";
	echo "<div class='hoverblock'>";
	echo "<img src='small/lupa.png' alt=''>";
	echo "</div>";
	echo "<img src='".$data['МаленькоеФото']."' class='article-img'>";
	echo "<div class='article-text'>";
	echo "<span class='text-head'>".$data['Название']."</span>";
	echo "<span class='text-dop'>" .$data['КраткоеОписание']."</span>";
	echo "</div>";
	echo "</article>";	
	echo "</a>";
}

	