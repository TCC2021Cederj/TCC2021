<?php
	session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Login de alunos e professores</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="shortcut icon" href="Imagens/icone.ico">
		
	</head>
	
	<body>
		<center>
			<div class="login">
				<img src="Imagens/cederj20anos.png">
				<img src="Imagens/cecierj.png" style="margin-left:40px;">
				<br>
				<br>
				<br>
				<form method="post" action="ValidaLogin.php" id="formularioLogin" name="formularioLogin">
					<input class="camposLogin" name="usuario" type="text" placeholder="Identificação de usuário">
					<br>
					<br>
					<input class="camposLogin" name="senha" type="password" placeholder="Senha">
					<br>
					<br>
					<button class="botaoEnviar" type="submit">Enviar</button>
				</form>
				<?php
					if(isset($_SESSION['usuario_invalido'])){
						echo"<br><h1>Usuário Inválido!</h1>";
					}
					unset($_SESSION['usuario_invalido']);
				?>
			</div>
		</center>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</body>