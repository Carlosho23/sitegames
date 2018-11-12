<?php

echo "<br><h3>.:: INSERE ::.</h3><br>";


$acao=$_GET["acao"];


if($acao == "inserir"){
    include 'aluno_recuperaForm.php';
    include 'banco/conecta.php';
    $insere = ("insert into tb_aluno (id_aluno, nome, data_nasc, email, celular, pais, plataforma, genero_jogo, genero_sexo, jogo_fav) values (NULL, '$nome', '$data_nasc', '$email', '$celular', '$pais', '$plataforma', '$genero_jogo', '$genero_sexo', '$jogo_fav');");
    mysqli_query($conn, $insere); // INSERE NO BANCO
    mysqli_commit($conn);  // EXECUTA A TRANSAÇÃO
    mysqli_close($conn);  // ENCERRA CONEXAO MySQL

    ?><br><span class='msg'>.:: Cadastro INSERIDO com Sucesso ! ::.</span><br><br><?php
    // REDIRECIONAMENTO AUTOMATICO EM 5 SEGUNDOS
    echo "<meta HTTP-EQUIV='refresh' CONTENT='3; URL=index.php?menu=insere'>";
}

?>

<form id="form1" method="POST" action="index.php?menu=insere&acao=inserir" enctype="multipart/form-data">

    <table width="350" border="0" cellspacing="5">
        <tr>
    
            Nome:<br>
            <input type="text" name="nome" value=""><br><br>
            
            Data de Nascimento:<br>
            <input type="text" name="data_nasc_" placeholder="aaaa-mm-dd"><br><br>
            
            E-mail:<br>
            <input type="text" name="email_" ><br><br>
            
            Celular:<br>
            <input type="text" name="celular_" placeholder="Ex:99999-9999"><br><br>
            
            País:<br>
            <input type="text" name="pais_"><br><br>
             
            Plataforma:<br>
            <input type="text" name="plataforma_" placeholder="PS4 , PC , XBOX ONE"><br><br>
            
             Genero do Jogo:<br>
            <input type="text" name="genero_jogo_"placeholder="Ex:Ação,Corrida,etc"><br><br>
            
             Sexo:<br>
            <input type="text" name="genero_sexo_" placeholder="M , F"><br><br>
            
             Jogo Favorito:<br>
            <input type="text" name="jogo_fav_"><br><br>
            
            <h1><input type="submit" value="Enviar"> <input type="reset" value="Limpar"></h1>
            
            <br><br>
            
        </tr>        
        
    </table>
    
</form>



