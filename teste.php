<?php include("valida.php"); 
    $consulta = "SELECT * FROM alunos";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<html>
    <head><meta charset="utf8"> 
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    </head>
    <body class="teste">
        <section class="testesection">
        <h1>CERTIFICADO</h1>
        <br>
        <?php
            $dado = $con->fetch_array();
            echo $dado[1];
        ?>
        </section>
    </body>
</html>