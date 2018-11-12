<?php

echo "<br><h3>.:: DELETA ::.</h3>";

$acao=$_GET["acao"];

if($acao == "deletar"){
    include 'aluno_recuperaForm.php';
    include 'banco/conecta.php';
    $id=$_GET["id"];
    
    $altera = ("DELETE FROM db_carlos.tb_aluno WHERE id_aluno='$id';");
    mysqli_query($conn, $altera); // INSERE NO BANCO
    mysqli_commit($conn);  // EXECUTA A TRANSAÇÃO
    mysqli_close($conn);  // ENCERRA CONEXAO MySQL

    ?><br><span class='msg'>.:: Cadastro DELETADO com Sucesso ! ::.</span><?php

    // REDIRECIONAMENTO AUTOMATICO EM 5 SEGUNDOS
    echo "<meta HTTP-EQUIV='refresh' CONTENT='3; URL=index.php?menu=deleta'>";
}

?>


<?php
    if($acao=="seleciona"){

    include 'aluno_recuperaDB.php';
?>

<form id="form1" method="POST" action="index.php?menu=deleta&acao=deletar&id=<?=$id?>" enctype="multipart/form-data">

    <table width="350" border="0" cellspacing="5">
        <tr>
            <td>Cód: </td>
            <td><?= $id_aluno ?></td>
        </tr>
        <tr>
            <td>Nome: </td>
            <td><?= $nome ?></td>
        </tr>
        <tr>
            <td>Data Nascimento: </td>
            <td><?= $data_nasc ?></td>
        </tr>    
        <tr>
            <td>E-mail: </td>
            <td><?= $email ?></td>
        </tr>    
        <tr>
            <td>Celular: </td>
            <td><?= $celular ?></td>
        </tr>    
        <tr>
            <td>País: </td>
            <td><?= $pais ?></td>
        </tr>    
        <tr>
            <td>Plataforma:  </td>
            <td><?= $plataforma ?></td>
        </tr>
        <tr>
            <td>Genero de jogo:  </td>
            <td><?= $genero_jogo ?></td>
        </tr>
        <tr>
            <td>Sexo:  </td>
            <td><?= $genero_sexo ?></td>
        </tr>
        <tr>
            <td>Jogo favorito:  </td>
            <td><?= $jogo_fav ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <br>
                <input type="submit" name="deletar" value="Deletar" /> 
                &nbsp;&nbsp;
                <input type="submit" name="limpa"  value="Limpar" />
            </td>
        </tr>        
        
    </table>
    
</form>

<?php
    }
?>




<?php
//#----------------------------------------------------------
//### CONSULTA NOME - SALARIO

echo "<br><br><br><h3>.:: LISTA DE ALUNOS ::.</h3>";

// CHAMA CONEXAO COM BANCO MySQL  
include 'banco/conecta.php';

// GERA UMA STRING DA CONSULTA
$sql = "SELECT id_aluno, nome, pais FROM tb_aluno ORDER BY nome asc";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

// TOTAL DE REGISTROS
$total = mysqli_num_rows($res);
echo "<br>Total de Resultados: " . $total;


// LISTA OS REGISTROS
echo  "<br><br><b>| NOME | PAIS | </b><br>";
while ($c = mysqli_fetch_array($res)){
    echo 	
        '<a href="index.php?menu=deleta&acao=seleciona&id='. $c['id_aluno'] .'">' . $c['nome'] . '</a>' . " | " .
	$c['pais'] . " | <br>" 
    ;
}

// FECHA CONEXÃO
mysqli_close($conn);
?>