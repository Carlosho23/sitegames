<?php

echo "<br><h3>.:: RELATÓRIO 2 ::.</h3>";
?>
<a href="index.php?menu=relatorio2">| Atualizar |</a>
<br>
<?php

// CHAMA CONEXAO COM BANCO MySQL  
include 'banco/conecta.php';


// GERA UMA STRING DA CONSULTA
$sql = "SELECT id_aluno, nome, pais FROM tb_aluno ORDER BY pais desc";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

// TOTAL DE REGISTROS
$total = mysqli_num_rows($res);
echo "<br>Total de Registros: <b>" . $total . "</b>";


// LISTA OS REGISTROS
echo  "<br><br><b>| CÓD | NOME | PAIS | </b><br>";
while ($c = mysqli_fetch_array($res)){
    echo 	
    $c['id_aluno'] . " | " .
	$c['nome'] . " | " .
	$c['pais'] . " | <br>" 
    ;
}

// FECHA CONEXÃO
mysqli_close($conn);
?>