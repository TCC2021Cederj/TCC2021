<?php
	include('VerificaLogin.php');
	require_once('conexao.php');
	if(isset($_POST['inativaAdm'])){
		$nomeAdm = $_POST['inativaAdm'];
		$queryInativa = 'update administrador set administrador.status = "Inativo" where administrador.nome = "'.$nomeAdm.'"';
		$resultadoQueryInativa = $conn->query($queryInativa);
		
	}
	if(isset($_POST['ativaAdm'])){
		$nomeAdm = $_POST['ativaAdm'];
		$queryInativa = 'update administrador set administrador.status = "Ativo" where administrador.nome = "'.$nomeAdm.'"';
		$resultadoQueryInativa = $conn->query($queryInativa);
		
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Lista de administradores</title>
		<link rel="stylesheet" type="text/css" href="novoestilo.css">
		<link rel="shortcut icon" href="Imagens/icone.ico">
		<script type="text/javascript" src="scriptHospital.js"></script>
		
	</head>
	
	<body>
		<center>
			<table border="1" width="100%">
				<tr>
					<td colspan="3">
						<center>
							<div class="materiaProf">
								<img src="Imagens/cederj20anos.png">
								<img src="Imagens/cecierj.png" style="margin-left:40px;">
							</div>
						</center>
						<br>
						<br>
						<br>
					</td>
				</tr>
				<tr>
					<td class="" colspan="3">
						<center>
							<div class="admEscolha">
							</div>
						</center>
						<br>
						<br>
						<br>
					</td>
				</tr>
				<tr>
					<td class="">
						<center>
							<form action="#" method="POST" id="ativaInativa2">
								<div class="admCadastro" id="zoom1">
										<label class="titulo">
											Lista de médicos cadastrados no sistema
										</label>
										<br>
										<br>
										<br>
										<table class="tabLista">
											<tr>
												<td>Nome</td>
												<td style="padding-left: 130px;">Status</td>
											</tr>											
										<?php
											require_once('conexao.php');
											$querySelectAdm = 'select * from administrador';
											$resultadoSelectAdm = $conn->query($querySelectAdm);
											while($linha = mysqli_fetch_assoc($resultadoSelectAdm)){
												echo '<tr><td>'.$linha['nome'].'</td><td style="padding-left: 130px;">'.$linha['status'].'</td><td style="padding-left:130px;"><button style="background-color:#f19800;" type="button" onclick="enviaInativaAdm(\''.$linha['nome'].'\')">Inativar</button></td><td><button style="background-color:#f19800;" type="button" onclick="enviaAtivaAdm(\''.$linha['nome'].'\')">Reativar</button></td></tr>';
											}
										?>
										</table>
								</div>
							</form>
						</center>
					</td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<br>			
			<div class="link">
				<a href="Administracao.php">
					<button class="voltaAdm">Voltar</button>
				</a>
			</div>
		</center>
	</body>
</html>