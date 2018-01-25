<?php
class Base{



	public function Query($query){
		include('config.php');
		$result = mysqli_query($link,$query);
		$resmas = [];
	while($res = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($resmas,$res);
	}
	return $resmas;
}
	public function TwigLoad($name,$array,$path) {
		require_once '../Twig/Autoloader.php';
		Twig_Autoloader::register();

		try {
			$loader   = new Twig_Loader_Filesystem( $path );
			$twig     = new Twig_Environment( $loader );
			$template = $twig->loadTemplate( $name );
			echo $template->render( $array );
		} catch ( Exception $exception ) {
			die ( 'Error: ' . $exception->getMessage() );
		}
	}

	public function GetUrlParam($nameParam){
		if (isset($_GET[$nameParam]))
			return $_GET[$nameParam];
		else return 0;
	}
	public function ConnectCSS(){
		echo "<link rel='stylesheet' href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\"'>";
        echo "<link rel='stylesheet' href=\"https://fonts.googleapis.com/css?family=Muli|Poppins\"/>";
        echo "<link rel='stylesheet' href='../css/main.css'>";

	}
	public function Page(){
		if (isset($_GET["page"])){
			$_GET["page"]++;
		}
		else {$_GET["page"] = 1;}
		return $_GET["page"];
	}

	public function BasketCookie(){
		$a = $this->GetUrlParam(a);
		if(isset($_POST['cookbut']))
			if(isset($_COOKIE['product'.$a]))
			{
				$col = $_COOKIE['product'.$a] + 1;
				setcookie("product".$a,$col, time() + 3600,"/");
			}
			else
			{
				$col = 1;
				setcookie("product".$a,$col, time() + 3600,"/");
			}
	}
	public function IsActive(){
		session_start();
		if($_SESSION['active'] == 1){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function ClearBasket(){
		include ('config.php');
		$res = mysqli_query($link,"SELECT * FROM Товары");
		$colprod = mysqli_num_rows($res);
		if(isset($_POST['clear'])){
			for($i = 1;$i <= $colprod;$i++){
				setcookie("product".$i,"", time() - 3600);
			}
		}
	}

	public function GetBasketGoods(){
		include ('config.php');
		$res = mysqli_query($link,"SELECT * FROM Товары");
		$colprod = mysqli_num_rows($res);
		$goods = [];
		for($i = 1;$i <= $colprod;$i++) {
			if ( isset($_COOKIE['product'.$i])) {
				$quer = mysqli_query( $link, "SELECT * from Товары where id=" . $i );
				$data = mysqli_fetch_array( $quer );
				array_push($data,$_COOKIE['product'.$i]);
				array_push($goods,$data);
			}
		}
		return $goods;
	}
	public function IsAdmin(){
		$user = $_SESSION['user'];
		$res = $this->Query("SELECT Админ FROM Пользователи WHERE id =".$user);
		return $res[0]['Админ'];
	}

}
