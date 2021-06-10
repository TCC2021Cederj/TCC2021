<?php
	include('VerificaLogin.php');
	require_once('conexao.php');
	if(isset($_POST['inativaMed'])){
		$crmMedico = $_POST['inativaMed'];
		$queryInativa = 'update medico set medico.status = "Inativo" where medico.crm = "'.$crmMedico.'"';
		$resultadoQueryInativa = $conn->query($queryInativa);
		
	}
	if(isset($_POST['ativaMed'])){
		$crmMedico = $_POST['ativaMed'];
		$queryInativa = 'update medico set medico.status = "Ativo" where medico.crm = "'.$crmMedico.'"';
		$resultadoQueryInativa = $conn->query($queryInativa);
		
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Lista de médicos</title>
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
							<form action="#" method="POST" id="ativaInativa">
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
												<td style="padding-left: 130px;">CRM</td>
											</tr>											
										<?php
											require_once('conexao.php');
											$querySelectMedico = 'select * from medico';
											$resultadoSelectMedico = $conn->query($querySelectMedico);
											while($linha = mysqli_fetch_assoc($resultadoSelectMedico)){
												echo '<tr><td>'.$linha['nome'].'</td><td style="padding-left: 130px;">'.$linha['crm'].'</td><td style="padding-left: 130px;">'.$linha['status'].'</td><td style="padding-left: 130px;"><button style="background-color:#f19800;" type="button" onclick="enviaInativaMed('.$linha['crm'].')">Inativar</button></td><td><button style="background-color:#f19800;" type="button" onclick="enviaAtivaMed('.$linha['crm'].')">Reativar</button></td></tr>';
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