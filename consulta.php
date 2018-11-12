<?php

echo "<br><h3>.:: CONSULTA ::.</h3>";
?>
<a href="index.php?menu=consulta">| Atualizar |</a>
<br>
<?php

// CHAMA CONEXAO COM BANCO MySQL  
include 'banco/conecta.php';


// GERA UMA STRING DA CONSULTA
$sql = "SELECT * FROM tb_aluno ORDER BY nome asc";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

// TOTAL DE REGISTROS
$total = mysqli_num_rows($res);
echo "<br>Total de Registros: <b>" . $total . "</b>";


// LISTA OS REGISTROS
echo  "<br><br><b>| CÓD | NOME | NASC | E-MAIL | CELULAR | PAIS | PLATAFORMA | GENERO JOGO | SEXO | JOGO FAV | </b><br>";
while ($c = mysqli_fetch_array($res)){
    echo 	
    $c['id_aluno'] . " | " .
	$c['nome'] . " | " .
	date('d/m/Y', strtotime($c['data_nasc'])) . " | " .
	$c['email'] . " | " .
	$c['celular'] . " | " .
	$c['pais'] . " | " .
    $c['plataforma'] . " | " .
    $c['genero_jogo'] . " | " .
    $c['genero_sexo'] . " | " .
    $c['jogo_fav'] . " |  <br>"
    ;
}

// FECHA CONEXÃO
mysqli_close($conn);
?>
