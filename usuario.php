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
            echo $_SESSION['nome'];
            ?>
        </p>
        
        <button type="button" onclick="cadastro()">Alterar Avatar</button>
        <button type="button" onclick="d()">Alterar Avatar</button>
        <a href="index.html">SAIR</a>
        <a href="certificado.php">BAIXAR</a>
        </div>
        <div id="modal" style="display:none">
            <h2>Selecione um Avatar</h2>
            
        </div>
    </div>
    <hr>
    <!--CURSOS DO ALUNO -->
    <h1>Seus Cursos</h1><br> 
    
   <div id="cursos">
    <?php 
        /*
        $consulta = "SELECT * FROM cursos";
        $consulta2 = "SELECT * FROM aluno_curso_progressos";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        $con2 = $mysqli->query($consulta2) or die($mysqli->error);
        $i = 0;
        while($c2 = mysqli_fetch_array($con2)){
            if($c2['ID_Aluno'] ==  $_SESSION['ID_Aluno']){
                while($c = mysqli_fetch_array($con)){ 
                    if($c['ID_Curso'] == $c2['ID_Curso']){
                        echo "<div style='text-align:center' id = 'oi'>".$c['Nome_curso']."<img  src='img/apertomao.jpg'>"
                        ."<a>Acessar Curso</a>"."</div>";
                        $i++;
                        break;
                    }
                } 
            } 
         }
         while($i>0){
            echo "<script>adcElemento()</script>";
            $i--;
         }
         
        */
        $oi = $_SESSION['ID_Aluno']; $i =0;
        $consulta = "SELECT cursos.Nome_curso, cursos.ID_Curso from alunos join aluno_curso_progressos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno join cursos ON cursos.ID_Curso = aluno_curso_progressos.ID_Curso WHERE alunos.ID_Aluno = $oi";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        while($c = mysqli_fetch_array($con)){
            echo "<div style='text-align:center' id = 'oi'>".$c['Nome_curso']."<img  src='img/apertomao.jpg'>"
                        ."<a href=".$c['ID_Curso'].".html".">Acessar Curso</a>"."</div>";
            $i++;
        }
        while($i>0){
            echo "<script>adcElemento()</script>";
            $i--;
         }
         
    ?>      
    </div>
</body>
</html>