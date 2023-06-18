<?php
include "conn.php";

if(isset($_GET['excluir'])){
    $id=$_GET['id'];
    $nome=$_GET['nome'];
    echo "deseja realmente excluir $nome?<br/>";
    echo "<a href='excluir.php?exclusao&id=$id'>sim</a><br/>";
    echo "<a href='excluir.php'>não</a>";
}
if(isset($_GET['exclusao'])){
    $id=$_GET['id'];
    $excluir=$conn->prepare('DELETE FROM usuario WHERE `usuario`.`id_usuario` = :pid');
    $excluir->bindValue(':pid',$id);
    $excluir->execute();
    echo"excluido com sucesso!";
} 
if(isset($_GET['alterar'])){
    $id=$_GET['id'];
    $alterar=$conn->prepare('SELECT * FROM `usuario` WHERE `id_usuario`=:pid;');
    $alterar->bindValue(':pid',$id);
    $alterar->execute();
    $row_alterar=$alterar->fetch();
    ?>
    <style>
        body{
    font-family:Arial,Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(30,180,200),rgb(17,70,71));
}
.box{
    color:white;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    background-color:rgba(0,0,0,0.5);
    padding:15px;
    border-radius:15px;
    width:25%;
}
fieldset{
    border:3px solid dodgerblue;
}
legend{
    border:1px solid dodgerblue;
    padding:10px;
    text-align:center;
    background-color:dodgerblue;
    border-radius:5px;
    
}
.inputUser{
    background:none;
    border:none;
    border-bottom:1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    letter-spacing:2px;
}
#submit{
    background-image:linear-gradient(to right, rgb(0,92,197), rgb(90,20,220));
    width:100%;
    border: none;
    padding:15px;
    color:white;
    font-size:15px;
    cursor:pointer;
    border-radius:10px;
}

        </style>
        </head>
<body>
    <div class="box">
        <form action="excluir.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Alteração</b></legend><br><br>
                <div class="inputbox">
                <input type="hidden" name="ID" class= inputUser required value=<?php echo $row_alterar['id_usuario']; ?>>
                
</div>
                <div class="inputbox">
                <input type="text" name="nome" class= inputUser required value=<?php echo $row_alterar['nome_usuario']; ?>>
                <label for="Nome" class="labelinput">Nome</label>
</div>
<br><br>
<div class="inputbox">
<input type="text" name="sobrenome" class= inputUser required value=<?php echo $row_alterar['sobrenome_usuario']; ?>>
<label for="sobrenome" class="labelinput">Sobrenome</label>
</div>
<div class="inputbox">
<br><br>
<input type="text" name="email" class= inputUser required value=<?php echo $row_alterar['email_usuario']; ?>>
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
<input type="submit"name="altera" id="submit" value="Alterar"/>
</div>
<br>
</fieldset>
</body>
</html>
</form>



    <?php
}
include "conn.php";
if(isset($_POST['altera'])){
    $nome=$_POST['nome'];
    $sobrenome=$_POST['sobrenome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $sexo=$_POST['sexo'];
    @$id=$_POST['id'];
    $altera=$conn->prepare('UPDATE `usuario` SET 
    `nome_usuario` = :pnome, 
    `sobrenome_usuario` = :psobrenome, 
    `email_usuario` = :pemail, 
    `senha_usuario` = :psenha, 
    `sexo_usuario` = :psexo WHERE `usuario`.`id_usuario` = :pid;');
    $altera->bindValue(":pnome",$nome);
    $altera->bindValue(":psobrenome",$sobrenome);
    $altera->bindValue(":email",$email);
    $altera->bindValue(':psenha',$senha);
    $altera->bindValue(':psexo',$sexo);
    $altera->bindValue(':pid',$id);
    $altera->execute();
    Echo "Alterado com sucesso";
}
?>

<table border="1">
    <th>
        <th>nome</th>
        <th>sobrenome</th>
        <th>email</th>
        <th>senha</th>
       
    </th>
<?php
$exib=$conn->prepare('SELECT * FROM `usuario`');
$exib->execute();
if($exib->rowCount()==0){
    echo"não há registro!";
}else{
    while($row=$exib->fetch()){
        echo "<tr>";
        echo "<td>".$row['nome_usuario']."</td>";
        echo "<td>".$row['sobrenome_usuario']."</td>";
        echo "<td>".$row['email_usuario']."</td>";
        echo "<td>".$row['senha_usuario']."</td>";
        echo "<td>".$row['sexo_usuario']."</td>";
        echo "<td><a href='excluir.php?excluir&id=".$row['id_usuario']."&nome=".$row['nome_usuario']."'>Excluir</a></td>";
        echo "<td><a href='excluir.php?alterar&id=".$row['id_usuario']."'>Alterar</a></td>";
        echo "</tr>";
    
       }
    }
?>
</table>

