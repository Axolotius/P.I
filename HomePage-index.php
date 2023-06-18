<!-- Home Page Inicio html -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link rel="stylesheet" type="text/css" href="HomePage-style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Calendarios de Remédios</title>
    </head>
    <body class="homePage-body">
        <!-- Cabeçalho Inicio html -->
        <div class="cabecalho">
            <div class="cabecalhoo">
                <div class="botao"> 
                    <div class="b"><a class="b1" href="HomePage-index.php">Home Page</a></div>
                </div>
                <div class="botao"> 
                    <div class="b"><a class="b2" href="HomePage-sobre.php">Sobre</a></div>
                </div>
                <div class="botao"> 
                    <div class="b"><a class="b3" href="HomePage-contato.php">Contato</a></div>
                </div>
                <div class="botao"> 
                    <div class="b"><a class="b4" href="User-cadastro.php">Login</a></div>
                </div>
            </div>
        </div>
            <!-- Cabeçalho Final html -->
        <div class="homePage-centro">
            <div class="titulo"><h1>Hora do Remédio</h1></div>
            <div class="homepage-img"><img src="/HomePage-img/veio.jpg" alt=""></div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="relogio">
                <script language="JavaScript">
                    <!--
                    function showtime(){
                        setTimeout("showtime();",1000);
                        callerdate.setTime(callerdate.getTime()+1000);
                        var hh = String(callerdate.getHours());
                        var mm = String(callerdate.getMinutes());
                        var ss = String(callerdate.getSeconds());
                        document.clock.face.value =
                        ((hh < 10) ? " " : "") + hh +
                        ((mm < 10) ? ":0" : ":") + mm +
                        ((ss < 10) ? ":0" : ":") + ss;

}
callerdate=new Date(<?php echo date("Y,m,d,H,i,s");?>);
//-->
</script>
<body onLoad="showtime()">
<form name="clock"><input type="text" name="face" value="" size=15></form>
            </div>
            <br>
            <div class="add-remedio"><a class="botao-add" href="#">Adicionar Alarme</a></div>
        </div>
    </body>
</html>

<!-- Home Page Final html -->