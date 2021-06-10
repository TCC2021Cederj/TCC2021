<?php 
	require_once('conexao.php');
	
	if(isset($_POST['nomeMedico']) && isset($_POST['crmMedico']) && isset($_POST['senhaMedico'])){
		$nomeMedico = $_POST['nomeMedico'];
		$crmMedico = $_POST['crmMedico'];
		$senhaMedico = $_POST['senhaMedico'];
		$queryInserirMedico = 'insert into medico (nome, crm, senha) values("'.$nomeMedico.'",'.$crmMedico.',"'.$senhaMedico.'")';
		$resultadoInsertMedico = $conn->query($queryInserirMedico);
	}
	else{
		if(isset($_POST['nomeAdm']) && isset($_POST['senhaAdm'])){
			$nomeAdm = $_POST['nomeAdm'];
			$senhaAdm = $_POST['senhaAdm'];
			$queryInserirAdm = 'insert into administrador (nome, senha) values("'.$nomeAdm.'","'.$senhaAdm.'")';
			$resultadoInsertAdm = $conn->query($queryInserirAdm);

		}
	}
	
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Administração</title>
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
								Selecione qual tipo de usuário deseja administrar:
								<br>
								<br>
								Médico<input type="radio" name="usuario" onclick="mostraMedico()" id="mostraMedico" checked>    Administrador<input type="radio" name="usuario" onclick="mostraAdm()" id="mostraAdm">
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
							<form action="#" method="POST" id="formAdministracao">
								<div class="admCadastro" id="zoom1">
									<div id="teste">
										<label class="titulo">
											Cadastro de médicos no sistema
										</label>
										<br>
										<br>
										<br>
										Nome do médico:<input type="text" name="nomeMedico" style="margin-left:20px;">
										<br>
										<br>
										CRM:<input type="text" name="crmMedico" style="margin-left:104px;">
										<br>
										<br>
										Senha:<input type="text" name="senhaMedico" style="margin-left:94px;">
										<br>
										<br>
										<a href="ListaMedicos.php">
											<button type="button" value="">Médicos cadastrados no sistema</button>
										</a>
									</div>
									
									<div class="admCadastro" id="teste1">
										<table>
											<tr>
												<td>Nome</td>
												<td>CRM</td>
												<td>Senha</td>
											</tr>											
										<?php
											$querySelectMedico = 'select * from medico';
											$resultadoSelectMedico = $conn->query($querySelectMedico);
											while($linha = mysqli_fetch_assoc($resultadoSelectMedico)){
												echo '<tr><td>'.$linha['nome'].'</td><td>'.$linha['crm'].'</td></tr>';
											}
										?>
										</table>
									</div>
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
				<button class="botaoEnviar" type="button" id="zoom" onclick="enviarCadMedico()">Enviar</button>
				<a href="Logout.php">
					<button class="sairAdm">Sair</button>
				</a>
			</div>
		</center>
	</body>
</html>