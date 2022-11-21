<?php include("valida.php"); 
    $consulta = "SELECT * FROM alunos";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<html>
    <head><meta charset="utf8"> 
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <script src="js/altera.js"></script>
    </head>
    <body class="teste">
        <section class="testesection">
        <h1>CERTIFICADO</h1>
        <br>
        <h2 id="oi">Aluno</h2>
        </section>
        <script>
            var oi = document.querySelector("#oi");

            console.log(oi);
            oi.textContent = "<?php
            $dado = $con->fetch_array();
            echo $dado[1];
        ?>";
        </script>
    </body>
</html>