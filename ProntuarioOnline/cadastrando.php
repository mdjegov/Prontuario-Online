<html>

<head>
<title>Efetuando Cadastro</title>
</head>

<body> 

<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "novobancodados";
$conexao = mysql_connect($host, $user, $pass)or die (mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>

<?php
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$CPF=$_POST['cpf'];
$RG=$_POST['rg'];
$CRM=$_POST['crm'];
$pais=$_POST['pais'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = mysql_query("insert into usuarios(nome, sobrenome, pais, estado, cidade, email, senha)
values('$nome','$sobrenome', '$pais','$estado', '$cidade', '$email', '$senha')"); 
echo "<center><h1>Cadastro efetuado com sucesso!</h1></center>";
?>
	
  <div id="Link">
		<span>Voltar para Página Inicial<span/><br/><br/>
			<form method="LINK" action="Index.php"> 
				<input type="submit" value="Pagina Inicial"> 
			</form>
	</div> 
</body>
</html>