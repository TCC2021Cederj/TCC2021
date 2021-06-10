<?php 
	include('VerificaLogin.php');
	require_once("conexao.php");
	
	/*Leitos ocupados pelos pacientes... Nome do leito, status do leito, nome do paciente, idade do paciente e crm do medico responsável*/
	
	$queryLeitosOcupados = 'select leito.nome as leitoNome, leito.status, paciente.nome as pacienteNome, paciente.idade, medico.crm from paciente, medico, leito WHERE leito.codigo_paciente = paciente.codigo and paciente.crm_medico = medico.crm';
	$resultadoLeitosOcupados  = $conn->query($queryLeitosOcupados);
	$arrayLeitosOcupados = array();
	while($leitosOcupados = mysqli_fetch_assoc($resultadoLeitosOcupados)){
		array_push($arrayLeitosOcupados,$leitosOcupados);
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------*/
	
	
	$queryLeitosDisponiveis = 'select leito.nome, leito.status from leito WHERE leito.status = "Disponivel"';
	$resultadoLeitosDisponiveis  = $conn->query($queryLeitosDisponiveis);
	$arrayLeitosDisponiveis = array();
	while($leitosDisponiveis = mysqli_fetch_assoc($resultadoLeitosDisponiveis)){
		array_push($arrayLeitosDisponiveis,$leitosDisponiveis);
	}
	
	if(isset($_POST['removeLeito'])){
		$valorRemove = $_POST['removeLeito'];
		
		$queryRemovePacienteDoLeito ='UPDATE leito SET leito.codigo_paciente = null WHERE leito.nome = "'.$valorRemove.'"';
		$resultadoRemovePacienteDoLeito = $conn->query($queryRemovePacienteDoLeito);
		
		$queryVoltaStatusDisponivel ='UPDATE leito SET leito.status = "Disponivel" WHERE leito.nome = "'.$valorRemove.'"';
		$resultadoVoltaStatusDisponivel = $conn->query($queryVoltaStatusDisponivel);
		header("Refresh: 0");
	}
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Leitos</title>
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
								Lista de leitos ocupados:
							</label>
							<br>
							<br>
							<table style="color:white">
								<tr>
									<td>Leito</td>
									<td style="padding-left: 35px;">Nome do paciente</td>
									<td style="padding-left: 35px;">Idade do paciente</td>
								</tr>
								<?php
									for($i = 0; $i < sizeof($arrayLeitosOcupados); $i++){
										echo '<tr><td>'.$arrayLeitosOcupados[$i]["leitoNome"].'</td><td style="padding-left: 35px;">'.$arrayLeitosOcupados[$i]["pacienteNome"].'</td><td style="padding-left: 35px;">'.$arrayLeitosOcupados[$i]["idade"].'</td><td><button style="background-color:#f19800;"type="button" onclick="removePaciente('."'".$arrayLeitosOcupados[$i]["leitoNome"]."'".')">Remover</button></td></tr>';
									}
								?>
							</table>
						</div>
					</td>
				
					<td class="tdsLeitos">
						<div class="listaLeitos" id="zoom">
							<label class="titulo">
								Lista de leitos disponíveis:
							</label>
							<br>
							<br>
							<table style="color:white">
								<tr>
									<td>Leito</td>
									<td style="padding-left: 35px;">Status do leito</td>
								</tr>
								<?php
									for($i = 0; $i < sizeof($arrayLeitosDisponiveis); $i++){
										echo '<tr><td>'.$arrayLeitosDisponiveis[$i]["nome"].'</td><td style="padding-left: 35px;">'.$arrayLeitosDisponiveis[$i]["status"].'</td></tr>';
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