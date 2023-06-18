<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <link rel="stylesheet" type="text/css" href="HomePage-style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Remédio</title>
</head>
<body class="body-remedio">
<div class="box-remedio">
        <form action="cadastroremedio.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Remédio</b></legend><br><br>
                <div class="inputbox">
                <input type="text" name="nome do medicamento" ID="nome do medicamento" class= inputUser required>
                <label for="Nome do Medicamento" class="labelinput">Nome</label>
</div>
<br>
<div class="inputbox">
                <input type="text" name="quantidade de medicamento" ID="quantidade de medicamento" class= inputUser required>
                <label for="Quantidade de Medicamento" class="labelinput">Quantidade</label>
</div>
<br>
<div class="inputbox">
                <input type="text" name="descrição" ID="descrição do medicamento" class= inputUser required>
                <label for="Descrição do medicamento" class="labelinput">Descrição</label>
</div>
<br>
<div>
<input type="submit"name="grava" id="submit" value="Gravar"/>
</div>
</body>
</html>


<?php
include "conn.php";
if(isset($_POST['grava'])){
    $nome_rmd=$_POST['nome'];
    $quantidade_rmd=$_POST['quantidade'];
    $id_desc=$_POST['id_desc'];
    $grava=$conn->prepare('INSERT INTO `remedio`(`id_rmd`, `nome_rmd`, `quantidade_rmd`,`id_desc`,
    VALUES (NULL, :pnome, :pquantidade, :pdesc');
    $grava->bindValue(':pnome',$nome);
    $grava->bindValue(':pquantidade',$quantidade);
    $grava->bindValue(':pdesc',$desc);
    $grava->execute();
    //echo "gravado com Sucesso";

}
?>



