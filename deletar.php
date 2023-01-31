<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultapro = "SELECT * from aluno_curso_progressos";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conPro = $mysqli->query($consultapro) or die($mysqli->error);
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
                            <a href="./historico.php">Histórico de Presença</a>
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
                            <a href="./historico.php">Histórico de Presença</a>
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
            <div id="func">
            <div id="listaAlunos" class="listAlunos">
                <div class="cont-header" id="cbcLista">
                    <h1>Cadastre o aluno <?php echo $_GET['nome'] ?> em um Curso ou mais:</h1>
                </div>
                <div class="content">   
                <div class="form-group col-12 col-lg-6">
                    <form action="valida.php" method="POST">
                        <?php 
                                     $consultaAP = "SELECT ID_Curso from aluno_curso_progressos WHERE ID_Aluno = '{$_GET['alunoid']}'";
                                     $conAP = $mysqli->query($consultaAP) or die ($mysqli->error);
                                     $cursos = [];
                                     while($cAP = mysqli_fetch_array($conAP)){
                                        $cursos [] = $cAP['ID_Curso'];
                                     }
                                     while($cC = mysqli_fetch_array($conCursos)){
                                        for($i=0;$i<count($cursos);$i++){
                                            if($cC['ID_Curso'] == $cursos[$i]){
                                                echo "<input type='checkbox' name='curso".$i."' value='".$cC['ID_Curso']."'>".$cC['Nome_curso']."</input><br>";
                                            }
                                        }
                                     }
                                   ?>
     
                                <h1 for="curso">Horarios do Aluno</h1><br>
                                <?php 
                                     $consultaHA = "SELECT ID_Aluno, ID_Horario from horarios_alunos WHERE ID_Aluno = '{$_GET['alunoid']}'";
                                     $conHA = $mysqli->query($consultaHA) or die ($mysqli->error);
                                     $horarios = [];
                                     while($cHA = mysqli_fetch_array($conHA)){
                                        $horarios [] = $cHA['ID_Horario'];
                                     }
                                     $consultaH= "SELECT * from horarios";
                                     $conH = $mysqli->query($consultaH) or die ($mysqli->error);
                                     while($cH = mysqli_fetch_array($conH)){
                                        for($i=0;$i<count($horarios);$i++){
                                            if($cH['ID_Horario'] == $horarios[$i]){
                                                echo "<input type='checkbox' name='horario".$i."' value='".$cH['ID_Horario']."'>".$cH['Dia']." : ".$cH['Hora_inicio']." - ".$cH['Hora_fim']." </input><br>";
                                            }
                                        }
                                     }
                                   ?>
                            <?php
                            echo "<a href='./listaAluno.php'   class='btn btn-success mr-2' style='background-color:blue;width:70px;height:40px;font-size:16px;color:white;margin-top:20px;margin-bottom:10px'>Voltar</a><input class='btn btn-success mr-2' type='submit' value='Deletar' name='deletarCursoHorario'>
                                <input style='display:none' value ='".count($horarios)."' name='tHorario'/> 
                                <input style='display:none' value ='".count($cursos)."' name='tCurso'/>    
                                <input style='display:none' value ='".$_GET['nome']."' name='nome'/>
                                <input style='display:none' value ='".$_GET['alunoid']."' name='alunoid'/>";
                            ?>
                    </form>
                                        
                                        
                </div>
                
                </div>
                </div>

                
               
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