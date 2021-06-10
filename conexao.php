<?php
$servidor = "tcc-db-instance.cxt9gfv1n7jc.us-west-2.rds.amazonaws.com";
$usuario = "tcc_user";
$senha = "tcc.2021";
$banco = "TCC2021";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if($conn-> connect_errno)
	echo "Falha na conexão: (".$conn-> connect_errno.") ".$conn-> connect_errno;


?>





