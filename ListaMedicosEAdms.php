<?php 
	include('VerificaLogin.php');
	require_once('conexao.php');
	
	$querySelectMedicos = 'select medico.nome, medico.crm from medico';
	$arrayMedicos = array();
	$resultadoQuerySelectMedicos = $conn->query($querySelectMedicos);
	while($linha = mysqli_fetch_assoc($resultadoQuerySelectMedicos)){
		array_push($arrayMedicos,$linha);
	}
	
	$querySelectAdms = 'select administrador.nome from administrador';
	$arrayAdms = array();
	$resultadoQuerySelectAdms = $conn->query($querySelectAdms);
	while($linha2 = mysqli_fetch_assoc($resultadoQuerySelectAdms)){
		array_push($arrayAdms,$linha2);
	}
	
	
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Lista de Médicos e Administradores</title>
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
					<td class="tdsLeitos">
						<form action="#" method="POST"id="formRemovePaciente">
						</form>
						<div class="listaLeitos" id="zoom">
							<label class="titulo">
								Lista de Médicos:
							</label>
							<br>
							<br>
							<table class="leitos">
								<tr>
									<td style="padding-left: 35px;">Nome do médico</td>
									<td style="padding-left: 35px;">CRM do médico</td>
								</tr>
								<?php
									for($i = 0; $i < sizeof($arrayMedicos); $i++){
										echo '<tr><td>'.$arrayMedicos[$i]["nome"].'</td><td style="padding-left: 35px;">'.$arrayMedicos[$i]["crm"].'</td></tr>';
									}
								?>
							</table>
						</div>
					</td>
				
					<td class="tdsLeitos">
						<div class="listaLeitos" id="zoom">
							<label class="titulo">
								Lista de administradores:
							</label>
							<br>
							<br>
							<table class="leitos">
								<tr>
									<td>Nome do administrador</td>
								</tr>
								<?php
									for($i = 0; $i < sizeof($arrayAdms); $i++){
										echo '<tr><td>'.$arrayAdms[$i]["nome"].'</td>';
									}
								?>
							</table>
						</div>
					</td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<a href="Inicio.php">
					<button class="botaoVoltarSolo" type="button" id="zoom" >Voltar</button>
				</a>
		</center>
	</body>
</html>