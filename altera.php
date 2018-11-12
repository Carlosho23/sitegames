<?php

echo "<br><h3>.:: ALTERA ::.</h3>";

$acao=$_GET["acao"];

if($acao == "alterar"){
    include 'aluno_recuperaForm.php';
    include 'banco/conecta.php';
    $id=$_GET["id"];
    
    $altera = ("update tb_aluno set nome='$nome', data_nasc='$data_nasc', email='$email', celular='$celular', pais='$pais', plataforma='$plataforma', genero_jogo='$genero_jogo', genero_sexo='$genero_sexo', jogo_fav='$jogo_fav' where id_aluno='$id';");
    mysqli_query($conn, $altera); // INSERE NO BANCO
    mysqli_commit($conn);  // EXECUTA A TRANSAÇÃO
    mysqli_close($conn);  // ENCERRA CONEXAO MySQL
    
    ?><br><span class='msg'>Cadastro ALTERADO com Sucesso!</span><?php
    // REDIRECIONAMENTO AUTOMATICO EM 5 SEGUNDOS
    echo "<meta HTTP-EQUIV='refresh' CONTENT='3; URL=index.php?menu=altera'>";
}

?>


<?php
    if($acao=="seleciona"){

    include 'aluno_recuperaDB.php';
?>

<form id="form1" method="POST" action="index.php?menu=altera&acao=alterar&id=<?=$id?>" enctype="multipart/form-data">

    <table width="350" border="0" cellspacing="5">
        <tr>
            <td>Cód: </td>
            <td><input type="text" name="id_aluno_" value="<?= $id_aluno ?>" readonly /></td>
        </tr>
        <tr>
            <td>Nome: </td>
            <td><input type="text" name="nome_" value="<?= $nome ?>"/></td>
        </tr>
        <tr>
            <td>Data Nascimento: </td>
            <td><input type="text" name="data_nasc_" value="<?= $data_nasc ?>"/></td>
        </tr>    
        <tr>
            <td>E-mail: </td>
            <td><input type="text" name="email_" value="<?= $email ?>"/></td>
        </tr>    
        <tr>
            <td>Celular: </td>
            <td><input type="text" name="celular_" value="<?= $celular ?>"/></td>
        </tr>    
        <tr>
            <td>País: </td>
            <td><input type="text" name="pais_" value="<?= $pais ?>"/></td>
        </tr>
        <tr>
            <td>Plataforma: </td>
            <td><input type="text" name="plataforma_" value="<?= $plataforma ?>"/></td>
        </tr>    
        <tr>
            <td>Genero de Jogo: </td>
            <td><input type="text" name="genero_jogo_" value="<?= $genero_jogo ?>"/></td>
        </tr>    
        <tr>
            <td>Sexo: </td>
            <td><input type="text" name="genero_sexo_" value="<?= $genero_sexo ?>"/></td>
        </tr>
         <tr>
            <td>Jogo Favorito: </td>
            <td><input type="text" name="jogo_fav_" value="<?= $jogo_fav ?>"/></td>
        </tr>
        
        <tr>
            <td colspan="2">
                <br>
                <input type="submit" name="altera" value="Alterar" /> 
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
$sql = "SELECT id_aluno, nome, celular, pais FROM tb_aluno ORDER BY nome asc";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

// TOTAL DE REGISTROS
$total = mysqli_num_rows($res);
echo "<br>Total de Resultados: " . $total;


// LISTA OS REGISTROS
echo  "<br><br><b>| NOME | CELULAR | PAÍS | </b><br>";
while ($c = mysqli_fetch_array($res)){
    echo 	
        '<a href="index.php?menu=altera&acao=seleciona&id='. $c['id_aluno'] .'">' . $c['nome']  . " | " .
	$c['celular'] . " | " .
	$c['pais'] . " | <br>" 
    ;
}

// FECHA CONEXÃO
mysqli_close($conn);
?>