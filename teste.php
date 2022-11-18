<?php include("valida.php"); 
    $consulta = "SELECT * FROM alunos";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<html>
    <head><meta charset="utf8"> 
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    </head>
    <body class="teste">
        pagina
        <br>
        <?php
            $dado = $con->fetch_array();
            echo $dado[1];
        ?>
    </body>
</html>