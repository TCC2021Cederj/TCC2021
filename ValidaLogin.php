<?php
	session_start();
	include("conexao.php");
	if(empty($_POST['usuario'])|| empty($_POST['senha'])){
		header('Location: Login.php');
		exit();
	}
	$usuario = mysqli_real_escape_string($conn,$_POST['usuario']);
	$senha = mysqli_real_escape_string($conn,$_POST['senha']);
	$query = 'select medico.crm, medico.senha from medico WHERE medico.crm = '.$usuario.' and medico.senha = "'.$senha.'"; ';
	$resultado = $conn->query($query);
	$linha = mysqli_num_rows($resultado);
	if($linha == 1){
		$_SESSION['usuario'] = $usuario;
		header('Location: Inicio.php');
		exit();
	}
	else{
		$query2 = 'select administrador.nome, administrador.senha from administrador WHERE administrador.nome = "'.$usuario.'" and administrador.senha = "'.$senha.'";';
		$resultado2 = $conn->query($query2);
		$linha2 = mysqli_num_rows($resultado2);
		if($linha2 == 1){
			$_SESSION['usuario'] = $usuario;
			header('Location: Administracao.php');
			exit();
		}else{
			$_SESSION['usuario_invalido'] = true;
			header('Location: Login.php');
			exit();
		}
	}
?>


