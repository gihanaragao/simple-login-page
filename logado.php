<?php
$login_cookie = $_COOKIE['login'];
$usuario_cookie = $_COOKIE['usuariocookie'];


if (isset($login_cookie)){
	//Caso o sistema detecte o cookie setado, o mesmo vai liberar a parte secreta
	echo "<!DOCTYPE html>";
	echo "<head> <link rel='stylesheet' type='text/css' href='css/styles.css'>";
	header("Content-type: text/html; charset=utf-8");
	echo "<title>Titulo da Pagina</title>";
	echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
	echo "</head>";
	echo "<body>";
    echo "<p id='rodapelogado'>Bem Vindo! Você está logado como $login_cookie <a href='?encerrasessao'>Sair</a></p>";
    echo "</body>";
    //Essa função elimina o cookie do navegador e retorna a pagina principal
		if (isset($_GET['encerrasessao'])){
			setcookie("login",$login, time()-3600);
			unset($_COOKIE['login']);
			unset($login_cookie);
			header('Location:index.php');
			}
	
	}
else{
	//Mostra o retorno quando o algoritmo não detectar o cookie de acesso ao sistema
	header("Content-type: text/html; charset=utf-8");
	echo "<title>ERRO</title>";
	echo "<h1> HTTP erro 404 </h1><BR>";
	echo "Você não tem permissão para acessar essa página<BR><BR>";
	echo "2016©. Gihan Aragão"; 

}
?>
</html>

