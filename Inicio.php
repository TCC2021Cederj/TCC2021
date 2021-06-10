<?php
	include('VerificaLogin.php');
	require_once("conexao.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<title>Início</title>
		<link rel="stylesheet" type="text/css" href="novoestilo.css">
		<link rel="shortcut icon" href="Imagens/icone.ico">
		<script type="text/javascript" src="scriptHospital.js"></script>
		
	</head>
	
	<body class="bdInicio">
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
					<td class="">
						<center>
							<div>
								<a href="CadastroPacientes.php">
									<button class="botoesInicio">Cadastro de pacientes</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
					<td class="">
						<center>
							<div>
								<a href="ListaPacientes.php">
									<button class="botoesInicio">Pacientes cadastrados no sistema</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
					<td class="">
						<center>
							<div>
								<a href="ListaReceituario.php">
									<button class="botoesInicio">Lista de receituario</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
				</tr>
				<tr>
					<td class="">
						<center>
							<div>
								<a href="Receituario.php">
									<button class="botoesInicio">Incluir receituario</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
					<td class="">
						<center>
							<div>
								<a href="Leitos.php">
									<button class="botoesInicio">Lista de leitos</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
					<td class="">
						<center>
							<div>
								<a href="AlocarPaciente.php">
									<button class="botoesInicio">Alocar o paciente a um leito</button>
								</a>
								<br>
								<br>
							</div>
						</center>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center>
							<div>
								<a href="Logout.php">
									<button class="botoesInicio">Sair</button>
								</a>
								<br>
								<br>

							</div>
						</center>
					</td>
				</tr>
			</table>
		</center>