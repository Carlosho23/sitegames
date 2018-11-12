<?php
// RECEBE ID via GET
$id=$_GET["id"];
       
// ABRE CONECAO COM BANCO
include("banco/conecta.php");

// CONSULTA POR UM ID ESPECÍFICO
$sql = "select * from tb_aluno where id_aluno=$id;";

// EXECUTA CONSULTA
$res = mysqli_query($conn, $sql);

$c = mysqli_fetch_array($res);

$id_aluno = $c['id_aluno'];
$nome = $c['nome'];
$data_nasc = $c['data_nasc'];
$email = $c['email'];
$celular = $c['celular'];
$pais = $c['pais'];
$plataforma = $c['plataforma'];
$genero_jogo = $c['genero_jogo'];
$genero_sexo = $c['genero_sexo'];
$jogo_fav = $c['jogo_fav'];

// FECHA CONEXAO COM BANCO
mysqli_close($conn); 