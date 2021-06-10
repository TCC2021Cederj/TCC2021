<?php 
	include('VerificaLogin.php');

	require_once("conexao.php");
	if(isset($_POST['nomePaciente']) && isset($_POST['idadePaciente']) && isset($_POST['crmMedicoResponsavel']) && isset($_POST['cpfPaciente'])){
		$nomePaciente = $_POST['nomePaciente'];
		$cpfPaciente = $_POST['cpfPaciente'];
		$idadePaciente = $_POST['idadePaciente'];
		$crmMedicoResponsavel = $_POST['crmMedicoResponsavel'];
		
		/*Insere os dados do paciente na tabela paciente*/
		$queryInsertPaciente = 'INSERT INTO paciente(cpf, nome, idade, status, crm_medico) VALUES ("'.$cpfPaciente.'", "'.$nomePaciente.'",'.$idadePaciente.',"Disponivel",'.$crmMedicoResponsavel.');';
		$resultadoSelectLeitosDisponiveis = $conn->query($queryInsertPaciente);
	}
		
		/*Faz o update na tabela leito, colocando o codigo do paciente que foi internado e altera seu status para "Ocupado"*/
		if(isset($_POST['selectLeitos'])){
			
			$escolheLeito = $_POST['selectLeitos'];
			$queryUpdateLeito = 'UPDATE leito 
								SET leito.codigo_paciente =
									(SELECT paciente.codigo from paciente WHERE paciente.cpf="'.$cpfPaciente.'"),
									leito.status = "Ocupado" 
								WHERE leito.codigo ="'.$escolheLeito.'";';
			echo($queryUpdateLeito);
			
			$resultadoUpdateLeito = $conn->query($queryUpdateLeito);
?>
	<script>
		alert('Paciente cadastrado com sucesso!');
	</script>
<?php
	}
	
	
		

	$selectLeitosDisponiveis = 'select leito.nome as nm, leito.codigo as cd from leito WHERE leito.status="Disponivel"';
	$resultadoSelectLeitosDisponiveis = $conn->query($selectLeitosDisponiveis);
	$arrayLeitosDisponiveis1 = array();
	$arrayLeitosDisponiveis2 = array();
	while($leitos = mysqli_fetch_assoc($resultadoSelectLeitosDisponiveis)){
		array_push($arrayLeitosDisponiveis1,$leitos['cd']);
		array_push($arrayLeitosDisponiveis2,$leitos['nm']);
	}
	
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Cadastro de Pacientes</title>
		<link rel="stylesheet" type="text/css" href="novoestilo.css">
		<link rel="shortcut icon" href="Imagens/icone.ico">
		<script type="text/javascript" src="scriptHospital.js"></script>
	</head>
	
	<body>
		<center>
			<form action = "#" method = "POST" id="formulario">
				<table width="100%" border="1">
					<tr>
						<td colspan="3">
							<center>
								<div class="materiaProf">
									<img src="Imagens/cederj20anos.png">
									<img src="Imagens/cecierj.png" style="margin-left:40px;">
									<br>
									<br>
									<label class="titulo">
										Cadastro de pacientes
									</label>
								</div>
							</center>
							<br>
							<br>
							<br>
						</td>
					</tr>
					<tr>
						<td class="tdsCadastroPaciente">
							<div class="divCadastro" id="zoom">
								<label class="titulo">
									Insira os dados solicitados abaixo:
								</label>
								<br>
								<br>
								<a class="labelsCadastro">
									Nome do paciente:
								</a>
								<input type="text" class="inputs" id="nomePaciente" name="nomePaciente">
								<br>
								<br>
								<a class="labelsCadastro">
									CPF do paciente:
								</a>
								<input type="text" class="inputs" id="cpfPaciente" name="cpfPaciente">
								<br>
								<br>
								<a class="labelsCadastro">
									Idade do paciente: 
								</a>
								<input type="text" class="inputs" id="idadePaciente" name="idadePaciente">
								<br>
								<br>
								<a class="labelsCadastro">
									CRM do Médico responsável: 
								</a>
								<input type="text" class="inputs" id="crmMedicoResponsavel" name="crmMedicoResponsavel">
								<br>
								<br>
							</div>
						</td>
						<td class="tdsCadastroPaciente">
							<div class="divCadastro2" id="zoom">
								<label class="titulo">
									Insira os dados solicitados abaixo:
								</label>
									<br>
									<br>
								<label class="titulo">
									O paciente será internado?
								</label>
								<br>
								Sim<input type="radio" id="radioInternadoSim" name="internado" value="sim" onclick="carregaSelect()">
								Não<input type="radio" id="radioInternadoNao" name="internado" value="nao" onclick="carregaSelect()">
									<br>
									<br>
									<select class="selectLeitos" name = "selectLeitos" id="selectLeitos">
										<option value="leito">
											Selecione o leito do paciente
										</option>
										<?php
											var_dump($arrayLeitosDisponiveis2[$i]);
											for($i = 0; $i < sizeof($arrayLeitosDisponiveis1); $i++){
												echo '<option value="'.$arrayLeitosDisponiveis1[$i].'">'.$arrayLeitosDisponiveis2[$i].'</option>';
											}
										?>
									</select>
									<br>
									<br>
									<br>
									<br>
									<br>
									<label> Depois de cadastrado, clique no botão abaixo para incluir o receituário do paciente</label>
									<br>
									<input type="button" id="receituario" value="Incluir receituario" onclick="criarReceituario()" style="margin-top:15px;">
									
							</div>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
				<br>
				<button class="botaoEnviar" type="button" id="zoom" onclick="enviarFormulario()">Cadastrar</button>
				<a href="Inicio.php">
					<button class="botaoVoltar" type="button" id="zoom" >Voltar</button>
				</a>
			</form>
		</center>
	</body>
</html>