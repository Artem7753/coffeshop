<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/use.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
</head>
<body>
	    	<section class="latest-project">
    		<span class="latest-project_head">Best-coffe</span>
    		<span class="latest-project_small">You are welcome!</span>
    		<menu class="latest-project_menu">
    			<ul class="latest-project_ul">
    				<li>Главная</li>
    				<li>Каталог</li>
    				<li>О нас</li>
    				<li>Контакты</li>
    				<a href="../models/basket.php" class="cat-but"><li>Корзина</li></a>
    				<a href="../models/come.php" class="cat-but"><li>Войти</li></a>
    			</ul>
    		</menu>
    		<div class="latest-project_articles">
    			<?include_once('../models/catalog.php')?>
    		</div>
    	</section>
	

	
</body>
</html>