<?php
 include("valida.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <script src="js/constroi.js"> </script>
</head>
<!-- CORPO DA PAGINA USUARIO -->
<body class="usuario">
    <!-- CABEÇALHO DA PAGINA -->
    <nav>
        <img style="width:100%; height: 30vh;" src="img/logonav.png">
    </nav>
    <!-- TROCA AVATAR DO USUARIO E VOLTA NA PAGINA INICIAL -->
    <div class="usuarioDiv">
        <img id="fotoLogin" src="img/apertomao.jpg">
        <div id="usuarioId">
        <p style="font-size:30px;margin-top:-5vh;margin-bottom:2vh"><?php if(!isset($_SESSION)){session_start();}
            echo $_SESSION['nome'];?>
        </p>
        
        <button type="button" onclick="cadastro()">Alterar Avatar</button>
        <a href="login.html">SAIR</a>
        <a href="certificado.php">BAIXAR</a>
        </div>
        <div id="modal" style="display:none">
            <h2>Selecione um Avatar</h2>
            
        </div>
    </div>
    <hr>
    <!--CURSOS DO ALUNO -->
    <h1>Seus Cursos</h1><br>        
    <div class="cursos">  
        <div class="cursoTela" style="margin-left:10vh;">
            <img s src="img/classes/porteiro.jpg"><br>
            <p></p>
            <?php
                echo $con2->fetch_array()[1];
            ?><br>
            <a href="curso.php"> acessar curso</a>
        </div>
        <div class="cursoTela" style="margin-left:10vh;">
            <img  src="img/classes/NR20.jpg"><br>
            <?php
                echo $con2->fetch_array()[1];
            ?><br>
            <a href="curso.php"> acessar curso</a>
        </div>
        <div class="cursoTela" style="margin-left:10vh;">
            <img  src="img/classes/primeiros_socorros.jpeg"><br>
            <?php
                echo $con2->fetch_array()[1];
            ?><br>
            <a href="curso.php"> acessar curso</a>
        </div>
        
</div>
    <script>
            adcElemento();
        </script>
    
</body>
</html>