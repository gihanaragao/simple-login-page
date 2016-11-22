<?php

ob_start();


$host="localhost"; // Nome do host onde esta o banco de dados. Padrão ‘localhost’ 
$usuariodb="root"; // Usuário do Mysql. Padrão ‘root’
$senhadb="senha"; // Senha do Mysql 
$db="dbmysql"; // Nome da Database 
$tabela="tabelamysql"; // Nome da tabela
// Conecta ao servidor e selecione a database.
mysql_connect("$host", "$usuariodb", "$senhadb")or die("Não foi possivel se conectar com a base de dados. Entre em contato com o administrador!"); 
mysql_select_db("$db")or die("Não foi possivel se conectar com a tabela apropriada. Favor entrar em contato com o administrador!");

// Busca as variaveis $login e $senha 
$login=$_POST['login']; 
$senhanormal=$_POST['senha'];
$senha=md5($senhanormal);

// Proteção contra  MySQL injection 
$login=stripslashes($login);
$senha=stripslashes($senha);
$login=mysql_real_escape_string($login);
$senha=mysql_real_escape_string($senha);

$sql="SELECT * FROM $tabela WHERE login = '$login' and senha = '$senha'";
$resultado = mysql_query($sql);
$sql1="SELECT nome_usuario FROM $tabela WHERE login = '$login'";
$usuario_nome = mysql_query($sql1);
// Mysql_num_row conta as linhas da tabela
// Se o resultado do  $login e $senha, a linha da tabela deve ser 1

if(mysql_num_rows ($resultado) == 1){
//Seta um cookie no navegador com tempo de 1h de duração para o sistema se autenticar na parte secreta
setcookie("login",$login, time()+3600);
header("Location:logado.php");
}
else {
//Pode colocar uma variável para ler na pagina inicial ou qualquer informação para o retorno "Login e senha invalidos!"
echo "<title>Titulo da Pagina </title>";
echo "login ou senha incorretos.";

}

ob_end_flush();
?>
