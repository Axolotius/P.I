<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HomePage-style.css"/>
    <title>Formulário | GN</title>
</head>
<body class="body-cadastro">
    <div class="box">
        <form action="User-cadastro.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend><br><br>
                <div class="inputbox">
                <input type="text" name="nome" ID="nome" class= inputUser required>
                <label for="Nome" class="labelinput">Nome</label>
</div>
<br><br>
<div class="inputbox">
<input type="text" name="sobrenome" ID="sobrenome" class= inputUser required>
<label for="sobrenome"class="labelinput">Sobrenome</label>
</div>
<div class="inputbox">
<br><br>
<input type="text" name="email" ID="email" class= inputUser required>
<label for="Email"class="labelinput">Email</label>
</div>
<br><br>
<div class="inputbox">
<input type="password" name="senha"class= inputUser required>
<label for="password"class="labelinput">Senha</label>
</div>
<br>
<div>
<p>Sexo:</p>
<input type="radio"id="Feminino" name="sexo" value="Feminino" required>
<label for="Feminino">Feminino</label>
</div>
<br>
<div>
<input type="radio"id="Masculino" name="sexo" value="Masculino" required>
<label for="Masculino">Masculino</label><br/><br/><br/>
<div>
    <br>
    <div>
<input type="submit"name="grava" id="submit" value="Gravar"/>
</div>
<br>
</fieldset>
</body>
</html>
</form>

<?php
include "conn.php";
if(isset($_POST['grava'])){
    $nome=$_POST['nome'];
    $sobrenome=$_POST['sobrenome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $sexo=$_POST['sexo'];
    //echo $nome.$sobrenome.$email.$senha.$sexo;
    $grava=$conn->prepare('INSERT INTO `usuario`
    (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `sexo_usuario`)
     VALUES (NULL, :pnome, :psobrenome, :pemail, md5(:psenha),:psexo);');
    $grava->bindValue(':pnome',$nome);
    $grava->bindValue(':psobrenome',$sobrenome);
    $grava->bindValue(':pemail',$email);
    $grava->bindValue(':psenha',$senha);
    $grava->bindValue(':psexo',$sexo);
    $grava->execute();
    //echo "gravado com Sucesso";

}
?>


