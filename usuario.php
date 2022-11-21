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
</head>
<body class="usuario">
    <nav>
        <img style="width:100vw; height: 20vh;" src="img/logonav.png">
    </nav>
    <div class="usuarioDiv">
        <img src="img/apertomao.jpg">
        <div id="usuarioBot">
        <p style="font-size:30px">
        <?php
            $dado = $con->fetch_array();
            echo $dado[1];
        ?>
        </p>
        <input type="submit" onclick="cadastro();" value="Alterar Avatar">
        <a href="login.html">SAIR</a>
        <a href="certificado.php">BAIXAR</a>
        
        <script>
            function cadastro(){
            alert('login.html');
        }
        </script>
        </div>
    </div>
    <h1>Seus Cursos</h1><br>        
    <div class="cursos">  
        <div>
            <img style="width:10vw; height: 20vh;" src="img/classes/Cuidador.jpg"><br>
            <?php
                echo $con2->fetch_array()[1];
            ?><br>
            <a href="curso.php"> acessar curso</a>
        </div>
        <div>
            <img style="width:10vw; height: 20vh;" src="img/classes/porteiro.jpg"><br>
            <?php
                echo $con2->fetch_array()[1];
            ?><br>
            <a href="curso.php"> acessar curso</a>
        </div>
        
    </div>
    
    
</body>
</html>