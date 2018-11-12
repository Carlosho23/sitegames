<?php
#$userdb = "";//usuário do seu banco de dados
#$passdb = "";// senha do banco de dados
#$tabledb = "";// tabela do banco de dados

#$conecta = mysql_connect($hostdb, $userdb, $passdb) or die (mysql_error());
#@mysql_select_db($tabledb, $conecta) or die ("Erro ao conectar com o banco de dados");


# RECEBE VIA POST
$busca = $_POST['palavra'];  
$acao = $_GET['acao']; 

?>
<!--- FORMULARIO -->
<FORM id="form1" method="POST" action="index.php?menu=consulta_avancada&acao=pesquisa" enctype="multipart/form-data">
    <table width="350" border="0" cellspacing="5">
        <tr>
            <td>Nome: </td>
            <td><input type="text" name="palavra" value=""/></td>
        </tr>	
        <tr>
            <td colspan="2">
                <br>
                <input type="submit" name="consulta" value="Consultar" /> 
                &nbsp;&nbsp;
                <input type="reset" name="limpa"  value="Limpar" />
            </td>
        </tr>        
        
    </table>


</FORM>




<?php

if($acao == 'pesquisa'){

	// CHAMA CONEXAO COM BANCO MySQL  
	include 'banco/conecta.php';


	// GERA UMA STRING DA CONSULTA
	$sql = "SELECT * FROM tb_aluno WHERE nome LIKE '%$busca%' ORDER BY nome asc";

	// EXECUTA CONSULTA
	$res = mysqli_query($conn, $sql);

	// TOTAL DE REGISTROS
	$total = mysqli_num_rows($res);
	echo "<br>Total de Registros: <b>" . $total . "</b>";

	if($total > 0){

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

	} else {
		echo "<br><br>Resultado da busca: <b>" . $busca . "</b> não entrado.";
	}
}
?>
