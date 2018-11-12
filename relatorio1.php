<?php

echo "<br><h3>.:: RELATÓRIO 1 ::.</h3>";
?>
<a href="index.php?menu=relatorio1">| Atualizar |</a>
<br>
<?php

// CHAMA CONEXAO COM BANCO MySQL  
include 'banco/conecta.php';


// GERA UMA STRING DA CONSULTA
$sql = "SELECT id_aluno, nome, email, celular FROM tb_aluno ORDER BY nome asc";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

// TOTAL DE REGISTROS
$total = mysqli_num_rows($res);
echo "<br>Total de Registros: <b>" . $total . "</b>";


// LISTA OS REGISTROS
echo  "<br><br><b>| NOME | E-MAIL | CELULAR | </b><br>";
while ($c = mysqli_fetch_array($res)){
    echo 	
	$c['nome'] . " | " .
	$c['email'] . " | " .
	$c['celular'] . " | <br>" 
    ;
}

// FECHA CONEXÃO
mysqli_close($conn);
?>