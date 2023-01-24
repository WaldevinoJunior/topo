<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
    $conCursos = $mysqli->query($consultaCursos) or die($mysqli->error);
    session_start();
    if($_SESSION['verifica'] != 2){
        header('Location: ./index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Topo Treinamentos</title>
    <link rel="sortcut icon" href="img/iconetopo.jpg" type="image/jpg" />

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="js/constroi.js"> </script>
</head>
<body id="adminBody">
<nav class="menuAdmin">
<a href="./admin.php"><img src="img/iconetopo.jpg" id="iconetopo"></a>
        <ul id="mAdmin">
            <li><a href="./admin.php"><i class="bi bi-house"></i>Início</a></li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i>
                    <div id="barras">
                        <a href="./curso.php">Cadastrar Curso</a>
                        <a href="./horario.php">Cadastrar Horários</a>
                        <a href="./alunoHorario.php">Cadastra Aluno em Horários</a>
                    </div>
            </li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i>
                    <div id="barras">
                        <a href="./mostrahorario.php">Horário</a>
                        <a href="./propagandas.php">Propragandas</a>
                    </div>
            </li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i>
                        <div id="barras">
                            <a href="./contratos.php">Contratos</a>
                            <a href="./pagamentos.php">Pagamentos</a>
                            <a href="./aniversariantes.php">Aniversariantes</a>
                        </div>
            </li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-gear"></i>Manutenção<i class="bi bi-caret-down"></i>
                    <div id="barras">
                    <?php
                        if($_SESSION['Perfil'] == "Administrador"){
                            echo  "<a href='valida.php?back'>Backup</a>";
                        }
                    ?>
                        <a href="./licenca">Licença</a>
                        <a href="./sat.php">Satisfação</a>
                    </div>
            </li>

            <li><a href="./valida.php?sair=true"><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
        <div>
        <img id="mAdmin2" src="img/menuH.png" onclick="menu()"/>
        <ul id="mAdmin3" style="display:none">
            <li><a href="./admin.php" style="color:black"><i class="bi bi-house"></i>Início</a></li>
            <li style="cursor:pointer;"><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i>
                    <div id="barras">
                        <a href="./curso.php">Cadastrar Curso</a>
                        <a href="./horario.php">Cadastrar Horários</a>
                        <a href="./alunoHorario.php">Cadastra Aluno em Horários</a>
                    </div>
            </li>
            <li style="cursor:pointer;"><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i>
                    <div id="barras">
                        <a href="./mostrahorario.php">Horário</a>
                        <a href="./propagandas.php">Propragandas</a>
                    </div>
            </li>
            <li style="cursor:pointer;"><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i>
                        <div id="barras">
                            <a href="./contratos.php">Contratos</a>
                            <a href="./pagamentos.php">Pagamentos</a>
                            <a href="./aniversariantes.php">Aniversariantes</a>
                        </div>
            </li>
            <li style="cursor:pointer;"><i class="bi bi-gear"></i>Manutenção<i class="bi bi-caret-down"></i>
                    <div id="barras">
                    <?php
                        if($_SESSION['Perfil'] == "Administrador"){
                            echo  "<a href='valida.php?back'>Backup</a>";
                        }
                    ?>
                        <a href="./licenca">Licença</a>
                        <a href="./sat.php">Satisfação</a>
                    </div>
            </li>

            <li><a href="./valida.php?sair=true" style="color:black"><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
        </div>
    </nav>
        <div class="admin">
            <div id="painel">
                <h2><strong>Administração</strong></h2>
                <!-- <a href="admin.php" class="btn btn-primary btn-sm">Voltar</a> -->
            <div id="func" style="flex-direction:column;">
            <?php
             $consultaHorario = "SELECT * from horarios";
             $conH = $mysqli->query($consultaHorario) or die($mysqli->error);
             while($cH = mysqli_fetch_array($conH)){
                if($cH['Dia'] == "Segunda-Feira"){
                    $hiSegunda [] = $cH['Hora_inicio'];
                    $hfSegunda [] = $cH['Hora_fim'];
                    $DispoSegunda []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Terça-Feira"){
                    $hiT [] = $cH['Hora_inicio'];
                    $hfT [] = $cH['Hora_fim'];
                    $DispoTerca [] =  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Quarta-Feira"){
                    $hiQuarta [] = $cH['Hora_inicio'];
                    $hfQuarta [] = $cH['Hora_fim'];
                    $DispoQuarta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Quinta-Feira"){
                    $hiQuinta [] = $cH['Hora_inicio'];
                    $hfQuinta [] = $cH['Hora_fim'];
                    $DispoQuinta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Sexta-Feira"){
                    $hiSexta [] = $cH['Hora_inicio'];
                    $hfSexta [] = $cH['Hora_fim'];
                    $DispoSexta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Sabádo"){
                    $hiSabado [] = $cH['Hora_inicio'];
                    $hfSabado [] = $cH['Hora_fim'];
                    $DispoSabado []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
                if($cH['Dia'] == "Domingo"){
                    $hiDomingo [] = $cH['Hora_inicio'];
                    $hfDomingo [] = $cH['Hora_fim'];
                    $DispoDomingo []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                }
             }
             echo "<h1>Segunda</h1><br>";
             for($i = 0 ; $i< count($hiSegunda); $i++){
                echo $hiSegunda[$i]."-".$hfSegunda[$i]." - Maquinas Disponiveis:".$DispoSegunda[$i]."<br>";
                }
                echo "<h1>Terça</h1>";
                for($i = 0 ; $i< count($hiT); $i++){
                    echo $hiT[$i]."-".$hfT[$i]." - Maquinas Disponiveis:".$DispoTerca[$i]."<br>";
                }
                echo "<h1>Quarta</h1>";
                for($i = 0 ; $i< count($hiQuarta); $i++){
                    echo $hiQuarta[$i]."-".$hfQuarta[$i]." - Maquinas Disponiveis:".$DispoQuarta[$i]."<br>";
                }
                echo "<h1>Quinta</h1>";
                for($i = 0 ; $i< count($hiQuinta); $i++){
                    echo $hiQuinta[$i]."-".$hfQuinta[$i]." - Maquinas Disponiveis:".$DispoQuinta[$i]."<br>";
                }
                echo "<h1>Sexta</h1>";
                for($i = 0 ; $i< count($hiSexta); $i++){
                    echo $hiSexta[$i]."-".$hfSexta[$i]." - Maquinas Disponiveis:".$DispoSexta[$i]."<br>";
                }
                echo "<h1>Sabádo</h1>";
                for($i = 0 ; $i< count($hiSabado); $i++){
                    echo $hiSabado[$i]."-".$hfSabado[$i]." - Maquinas Disponiveis:".$DispoSabado[$i]."<br>";
                }
                echo "<h1>Domingo</h1>";
                for($i = 0 ; $i< count($hiDomingo); $i++){
                    echo $hiDomingo[$i]."-".$hfDomingo[$i]." - Maquinas Disponiveis:".$DispoDomingo[$i]."<br>";
                }
            ?>



            </div>            
            <div id="func2">
                <div class="func2A">
                    <p>Licença</p>
                    <p style="font-size:80px">00</p>
                    <p>Dias Restantes</p>
                </div>
                <div class="func2A">
                    <p>Alunos Online</p>
                    <p style="font-size:80px">00</p>
                    <p>Alunos</p>
                </div>
                <div class="func2A">
                    <p>Número de Máquinas</p>
                    <p style="font-size:80px">00</p>
                    <p>Máquinas</p>
                </div>
            </div>
        </div> 
</body>
</html>