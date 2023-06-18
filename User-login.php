<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="HomePage-style.css"/>
    <title>Tela de Login</title>
</head>
<body class="homePage-body">
    <div class="div-login">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input class="input-login" type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputsubmit" type="submit" value="Logar" name='logar'>
            <br><br>
            <br><br>
            <a href="User-cadastro.php" style="float:right" class="inputsubmit" role="button" >Cadastrar</a>
        </form>
    </div>
</html>

<?php
// validação de login e senha 
include "conn.php";
if(isset($_POST['logar'])){//esta validação serve p saber se uma variavel esta definida(retorna um valor v ou f)
    $email=$_POST['email'];//criar duas variaveis e 2 parametros
    $senha=$_POST['senha'];
     // verificar no banco de dados se existe um campo email e senha.
   $login=$conn->prepare('SELECT * FROM `usuario` WHERE `email_usuario`= :pemail AND `senha_usuario`=md5(:psenha);');
   $login->bindvalue(':pemail',$email);
   $login->bindvalue(':psenha',$senha);
   $login->execute();
if($login->rowcount()==0){
    echo "login ou senha inválido!";
}else{
    session_start();
    $row=$login->fetch();
    $_SESSION['login']=$row['id_usuario'];
    header('location:index-login-cadastro.php');

}
}

?>s