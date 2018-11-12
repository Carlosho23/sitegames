<?php

// mysqli
// http://rberaldo.com.br/como-atualizar-php-mysql-mysqli/

// LOCALHOST
//$host = "localhost";
//$host = "http://srv018sifatecie.ddns.net:8090";
$host = "localhost";
$usuario = "carlos";
$senha = "5196";
$banco = "db_carlos";

// CONEXAO
$conn = mysqli_connect($host, $usuario, $senha, $banco);


// VERIFICA CONEXAO
if($conn){	
	echo("<br>Parabéns!!! Conexão com o banco de dados MySQL realizada com SUCESSO!");
} else {
	printf("<br>Falha na conexão com banco de dados: %s\n", mysqli_connect_error());
	exit();
}


?>
