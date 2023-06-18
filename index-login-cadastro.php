
<?php
include "login.php";
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}
include "conn.php";
$id=$_SESSION['login'];
$nome=$conn->prepare('SELECT * FROM
usuario WHERE id_usuario=:pid');
$nome->bindValue(':pid',$id);
$nome->execute();
$rownome=$nome->fetch();
echo "Bem vindo ".$rownome['nome_usuario']."! ";
echo "<a href='index-login-cadastro.php?aviso'>
Logout</a>";
echo "<br/>";
if(isset($_GET['aviso'])){
    echo "Deseja realmente sair?<br/>";
    echo "<a href='login.php?logout'>Sim</a>";
    echo "<a href='index-login-cadastro.php'>Não</a>";
}
if(isset($_GET['logout'])){
    session_destroy();
    header('location:login.php');
}

?>