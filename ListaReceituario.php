<?php 
	include('VerificaLogin.php');
	require_once("conexao.php");
	if(isset($_POST['resultReceituario'])){
		$cpfPaciente = $_POST['resultReceituario'];
		
		$queryTabelaReceituario  = 'SELECT receituario.codigo, receituario.ficha, paciente.nome, medico.nome as medico 
									FROM receituario, paciente, medico 
									WHERE receituario.crm_medico = medico.crm 
									and receituario.paciente_codigo = paciente.codigo
									and paciente.cpf = "'.$cpfPaciente.'"' ;
		$resultadoqueryTabelaReceituario = $conn->query($queryTabelaReceituario);
		$arrayTabela = array();
		while($linha = mysqli_fetch_assoc($resultadoqueryTabelaReceituario)){
			array_push($arrayTabela,$linha);
		}
		
		if(isset($_POST['removeReceituario'])){
			$codigoReceituario = $_POST['removeReceituario'];
			$queryDeleteReceituario  = 'update receituario set receituario.status = "Excluido" WHERE receituario.codigo ="'.$codigoReceituario.'"';
			$resultadoqueryDeleteReceituario = $conn->query($queryDeleteReceituario);
		}
	
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Lista Receituário</title>
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
								</div>
							</center>
							<br>
							<br>
							<br>
						</td>
					</tr>
					<tr>
						<td class="tdsListaReceituario">
							<center>
								<div class="listaReceituario" id="zoom">
									<div id="mudar">
										<form method="POST" action="#" id="formReceituario">
											<label class="titulo" id="tituloReceituario">
												Lista de receituário(os):
											</label>
											<br>
											<br>
											<center>
												<label class="titulo" id="tituloReceituario">
													Digite o CPF do cliente que deseja consultar o receituário: 
													<input type="text" name="resultReceituario">
													<button type="submit">Pesquisar</button>
												</label>
												<br>
												<br>
												<table style="padding-left:60px;color:white">
													<tr>
														<td style="padding-left: 35px;">Código do receituário</td>
														<td style="padding-left: 35px;">Nome do paciente</td>
														<td style="padding-left: 35px;">Nome do médico responsável</td>
														<td style="padding-left: 35px;">Ficha</td>
													</tr>
													<?php
														if(isset($_POST['resultReceituario'])){
															for($i = 0; $i < sizeof($arrayTabela); $i++){
																echo '<tr><td style="padding-left: 35px;">'.$arrayTabela[$i]['codigo'].'</td><td style="padding-left: 35px;">'.$arrayTabela[$i]['nome'].'</td><td style="padding-left: 35px;">'.$arrayTabela[$i]['medico'].'</td><td style="padding-left: 35px;">'.$arrayTabela[$i]['ficha'].'</td></tr>';
															}
														}
													?>
												</table>
											</center>
										</form>
									</div>
								</div>
							</center>
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