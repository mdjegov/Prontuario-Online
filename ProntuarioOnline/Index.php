<?php
	$ipPlayer = $_SERVER["REMOTE_ADDR"];
	include("connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Prontuario Online </title>
	</head>
	<body>
		<div id="container">
			<img src="images/logo.png" alt="Imagem Logo" />
			<div id="login">
				<form action="pag-login.php?pag=checkLogin" method="POST">
					
					<div id="input">
						<span> Usuário </span>
							<input name="input_User" type="text" /> <br />
						<span> Senha </span>
							<input name="input_Pass" type="password" />
						<input type="submit" value="Login" /><br /><br /><br/><br/>
	
					</div>
				</form>
				
				<div id="Link">
					<span>Faça seu Cadastro<span/><br/><br/>
					<form method="LINK" action="Cadastro.php"> 
						<input type="submit" value="Cadastre-se"> 
					</form>
				</div>
				
				<span class="span_IP"> Por segurança seu endereço de IP ( <b> <?php echo $ipPlayer; ?> </b> ) foi registrado!</span>
			</div>
		</div>
	</body>
</html>
<?php	
	if(isset($_GET["pag"])) {
		$user = $_POST["input_User"];
		$pass = $_POST["input_Pass"];
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='pag-login.php'</script>";
		}
		$check = mysql_query("SELECT * FROM usuarios WHERE Usuario='$user' AND Senha='$pass'") or die (mysql_error());
		$row   = mysql_num_rows($check);
		if($row > 0) {
			$check2 = mysql_query("SELECT Permissao FROM usuarios WHERE Usuario='$user'");
			$row2   = mysql_num_rows($check2);
			if($row2) {
				$dadosUsuario = mysql_fetch_array($check2);
				if($dadosUsuario["Permissao"] == 1) {
					echo "<script> alert('Bem vindo ao Painel de Controle!'); location.href='control-panel.php'</script>";
				} else {
					echo "<script> alert('Você não tem permissão!'); location.href='pag-login.php'</script>";
				}
			}
		} else {
			echo "<script> alert('Usuário ou Senha incorretos!'); location.href='pag-login.php'</script>";
		}
	}
?>