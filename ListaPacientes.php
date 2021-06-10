<?php 
	include('VerificaLogin.php');
	require_once("conexao.php");
	
	if(isset($_POST['deletaCadastroPaciente'])){
		$cpfPaciente = $_POST['deletaCadastroPaciente'];
		$queryCodigoPacienteDeletado = 'SELECT leito.codigo_paciente 
								FROM paciente, leito 
								WHERE paciente.cpf = "'.$cpfPaciente.'" and paciente.codigo = leito.codigo_paciente';
		$resultadoCodigoPacienteDeletado  = $conn->query($queryCodigoPacienteDeletado);
		if($cdPaciente = mysqli_fetch_assoc($resultadoCodigoPacienteDeletado)){
				$queryUpdateStatusPacienteDeletado = 'UPDATE leito SET leito.codigo_paciente = null,leito.status = "Disponivel" WHERE leito.codigo_paciente = '.$cdPaciente["codigo_paciente"].';';
				$conn->query($queryUpdateStatusPacienteDeletado);		
		}
		
		
		$queryDeletaCadastroPaciente = 'update paciente set paciente.status="Inativo"  WHERE paciente.cpf = "'.$cpfPaciente.'"';
		$conn->query($queryDeletaCadastroPaciente);
		
	}
	if(isset($_POST['voltaCadastroPaciente'])){
		$cpfPaciente2 = $_POST['voltaCadastroPaciente'];
		$queryCodigoPacienteDeletado2 = 'SELECT paciente.codigo
								FROM paciente 
								WHERE paciente.cpf = "'.$cpfPaciente2.'"';
		$resultadoCodigoPacienteDeletado2  = $conn->query($queryCodigoPacienteDeletado2);
		if($cdPaciente2 = mysqli_fetch_assoc($resultadoCodigoPacienteDeletado2)){
				$queryVoltaPaciente  = 'UPDATE paciente SET paciente.status = "Disponivel" WHERE paciente.cpf = "'.$cpfPaciente2.'"';
				$conn->query($queryVoltaPaciente);		
		}
		 
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------------*/
	
	/*Leitos ocupados pelos pacientes... Nome do leito, status do leito, nome do paciente, idade do paciente e crm do medico responsável*/
	
	$queryPacientesCadastrados = 'select paciente.nome, paciente.cpf, paciente.idade, paciente.status from paciente';
	$resultadoPacientesCadastrados  = $conn->query($queryPacientesCadastrados);
	$arrayPacientesCadastrados = array();
	while($pacientes = mysqli_fetch_assoc($resultadoPacientesCadastrados)){
		array_push($arrayPacientesCadastrados,$pacientes);
	}
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Lista de pacientes cadastrados</title>
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
					<td class="tds">
						<form action="#" method="POST"id="formCadastroPaciente">
						</form>
						
						<div class="listaPacientesCadastrados" id="zoom">
							<label class="titulo">
								Pacientes cadastrados no sistema
							</label>
							<br>
							<br>
							<center>
								<table class="leitos" style="color:white">
									<tr>
										<td>Nome do paciente</td>
										<td style="padding-left: 35px;">CPF do paciente</td>
										<td style="padding-left: 35px;">Idade do paciente</td>
										<td style="padding-left: 35px;">Status do paciente</td>
									</tr>
									<?php
										for($i = 0; $i < sizeof($arrayPacientesCadastrados); $i++){
											echo '<tr><td>'.$arrayPacientesCadastrados[$i]["nome"].'</td><td style="padding-left: 35px;">'.$arrayPacientesCadastrados[$i]["cpf"].'</td><td style="padding-left: 35px;">'.$arrayPacientesCadastrados[$i]["idade"].'</td><td style="padding-left: 35px;">'.$arrayPacientesCadastrados[$i]["status"].'</td><td><button style="background-color:#f19800;"type="button" onclick="removeCadastroPaciente('."'".$arrayPacientesCadastrados[$i]["cpf"]."'".')">Inativar</button></td><td><button style="background-color:#f19800;"type="button" onclick="voltaCadastroPaciente('."'".$arrayPacientesCadastrados[$i]["cpf"]."'".')">Reativar</button></td></tr>';
										}
									?>
								</table>
							<center>
						</div>
					</td>
				</tr>
			</table>
			<br>
			<br>
			<br>
			<a href="Inicio.php">
				<button class="botaoVoltar" type="button" id="zoom" >Voltar</button>
			</a>
		</center>
	</body>
</html>