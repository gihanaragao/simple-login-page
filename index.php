
<title>Titulo da Pagina</title>
<table width="207" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<form name="form1" method="post" action="verifica.php"
<td width="205">
<table width="75%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Bem-vindo</strong></td>
</tr>
<tr>
<td width="45">Login</td>
<td width="4">:</td>
<td width="227"><input name="login" type="text" id="login"></td>
</tr>
<tr>
<td>Senha</td>
<td>:</td>
<td><input name="senha" type="password" id="senha"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<?php

$cookie = $_COOKIE['login'];
//Caso o cookie de autenticação estiver setado e dentro da validade o sistema joga para a parte secreta automaticamente
if ($cookie == NULL){
}
else{
header ('Location:logado.php');
}

?>
