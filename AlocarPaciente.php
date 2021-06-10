<?php 
	include('VerificaLogin.php');

	require_once("conexao.php");
	$select = 'select leito.nome from leito WHERE leito.status="Disponivel"';
	$resultado = $conn->query($select);
	$array = array();
	while($leitos = mysqli_fetch_assoc($resultado)){
		array_push($array,$leitos['nome']);
	}
	
	if(isset($_POST['cpfPaciente'])){
		$cpf = $_POST['cpfPaciente'];
		$leitos = $_POST['alocarLeitos'];
		$update = 'update leito 
					set leito.codigo_paciente = 
												(select paciente.codigo from paciente where paciente.cpf = "'.$cpf.'"),leito.status = "Ocupado" 
					where leito.nome = "'.$leitos.'"';
		$resultadoUpdate = $conn->query($update);
		header("Refresh: 0");
?>
	<script>
		alert('Paciente alocado com sucesso!');
	</script>
<?php
	}
		
	
	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Alocar paciente ao leito</title>
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
										Alocação de pacientes aos leitos
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
							<div class="divCadastro" id="zoom" style="margin-left:150px;">
								<label class="titulo">
									Insira os dados solicitados abaixo:
								</label>
								<br>
								<br>
								<a class="labelsCadastro">
									CPF do paciente:
								</a>
								<input type="text" class="inputs" id="cpfPaciente" name="cpfPaciente">

								<select name = "alocarLeitos" id="selectLeitos">
									<option value="leito">
										Selecione o leito do paciente
									</option>
									<?php
										for($i = 0; $i < sizeof($array); $i++){
											echo '<option value="'.$array[$i].'">'.$array[$i].'</option>';
										}
									?>
								</select>
							</div>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
				<button class="botaoEnviar" type="submit" id="zoom" >Alocar Paciente</button>
				<a href="Inicio.php">
					<button class="botaoVoltar" type="button" id="zoom" >Voltar</button>
				</a>
			</form>
		</center>
	</body>
</html>