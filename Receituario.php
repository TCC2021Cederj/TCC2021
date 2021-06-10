<?php 
	include('VerificaLogin.php');
	require_once("conexao.php");
	if(isset($_POST['crm']) && ($_POST['paciente']) && ($_POST['data']) && ($_POST['receituario'])){
		$crm = $_POST['crm'];
		$paciente = $_POST['paciente'];
		$data = $_POST['data'];
		$receituario = $_POST['receituario'];
		$queryCodigoPaciente  = 'SELECT paciente.codigo FROM paciente WHERE paciente.nome = "'.$paciente.'";';
		$resultadoQueryCodPaciente = $conn->query($queryCodigoPaciente);
		if($linha = mysqli_fetch_assoc($resultadoQueryCodPaciente)){
			$queryInsertReceituario = 'insert into receituario (crm_medico, paciente_codigo, data, status, ficha)
										values ("'.$crm.'","'.$linha['codigo'].'","'.$data.'","Disponivel","'.$receituario.'");';
			$resultadoInsertReceituario = $conn->query($queryInsertReceituario);
			header("Refresh: 0");
		}
?>
	<script>
		alert('Receituário incluído com sucesso!');
	</script>
<?php
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Receituário</title>
		<link rel="stylesheet" type="text/css" href="novoestilo.css">
		<link rel="shortcut icon" href="Imagens/icone.ico">
		<script type="text/javascript" src="scriptHospital.js"></script>
		
	</head>
	
	<body>
		<center>
			<table width="100%">
				<tr>
					<td colspan="3">
						<center>
							<div class="materiaProf">
								<img src="Imagens/cederj20anos.png">
								<img src="Imagens/cecierj.png" style="margin-left:40px;">
								<br>
								<br>
								<label class="titulo">
									Inclusão de receituários
								</label>
							</div>
						</center>
						<br>
						<br>
						<br>
					</td>
				</tr>
				<tr>
					<td class="tdsReceituario">
						<div class="receituario" id="zoom">
							<div id="mudar">
								<form method="POST" action="#" id="formReceituario">
									<label class="titulo" id="tituloReceituario">
										Digite o CPF do cliente(já cadastrado):
									</label>
									<br>
									<br>
									<input type="text" name="cpfReceituario">
									<input type="submit" value="Consultar">
									<?php
										require_once("conexao.php");
	
										if(isset($_POST['cpfReceituario'])){
											$cpfReceituario = $_POST['cpfReceituario'];
											$queryConsultaCPF = 'select paciente.nome as paciente, medico.crm, medico.nome as medico 
																from paciente, medico 
																WHERE paciente.cpf = "'.$cpfReceituario.'" and paciente.crm_medico = medico.crm';
											$resultadoQueryConsultaCPF = $conn->query($queryConsultaCPF);
											$arrayReceituario = array();
		
											if($linha = mysqli_fetch_assoc($resultadoQueryConsultaCPF)){
												echo '<br><br>Médico: <input type="text" id="nomeMedico" value="'.$linha['medico'].'" name="medico" style="margin-right:20px;">CRM: <input type="text" id="crmMedico" value="'.$linha['crm'].'" name="crm"><br><br>Paciente: <input type="text" id="nomePaciente" value="'.$linha['paciente'].'" name="paciente" style="margin-right:20px;">Data: <input type="text" id="data" name="data"><br><br><textarea style="width:518px;height:277;resize:none;" name="receituario"></textarea><br><br><input type="button" value="Salvar" onclick="enviarReceituario()">     <input type="button" value="Imprimir" onclick="imprime()">';
											}
											else{
												echo 'CPF não encontrado!';
											}
										}
									?>
								</form>
							</div>
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