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
    <?php 
    include("valida.php");
    session_start();
$alunocpf= $_GET['cpf'];
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    if($_SESSION['Perfil'] == "Afiliado"){
        $consultaAfiliadoAluno = "SELECT * from cursos_afiliados WHERE ID_afiliados = '{$_SESSION['id']}'";
        $conAA = $mysqli->query($consultaAfiliadoAluno) or die($mysqli->error);
    }
    if($_SESSION['Perfil'] == "Franqueado"){
        $consultaFranqueadoAluno = "SELECT * from cursos_franqueados  WHERE ID_franqueador = '{$_SESSION['id']}'";
        $conFA = $mysqli->query($consultaFranqueadoAluno) or die($mysqli->error);
    }
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conAlunos2 = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
    $conCursos = $mysqli->query($consultaCursos) or die($mysqli->error);
    if($_SESSION['verifica'] != 2){
        header('Location: ./index.html');
    }
?>
    <script> var cpf = "<?php echo $alunocpf ?>"
    
    console.log(cpf);
    
    </script>
    <a href="./admin.php"><img src="img/iconetopo.jpg" id="iconetopo"></a>
        <ul id="mAdmin">
            <li><a href="./admin.php"><i class="bi bi-house"></i>Início</a></li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i>
                    <div id="barras">
                    <?php
                     if($_SESSION['Perfil'] == "Administrador"){
                        echo  " <a href='./curso.php'>Cadastrar Curso</a>";
                    }
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                            echo  "
                            <a href='./horario.php'>Cadastrar Horários</a>
                            <a href='./alunoHorario.php'>Cadastra Aluno em Horários</a>";
                        }
                    ?>
                    </div>
            </li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i>
                    <div id="barras">
                    <?php
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                            echo  "<a href='./mostrahorario.php'>Horário</a>
                            <a href='./propagandas.php'>Propragandas</a>";
                        }
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador"){
                            echo  "
                            <a href='./mostraCurso.php'>Curso</a>";
                        }
                    ?>
                    </div>
            </li>
            <li style="cursor:pointer;color:rgb(216, 211, 211)"><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i>
                        <div id="barras">
                        <?php
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                            echo  " <a href='./contratos.php'>Contratos</a>
                            <a href='./pagamentos.php'>Pagamentos</a>
                            <a href='./aniversariantes.php'>Aniversariantes</a>
                            <a href='./historico.php'>Históricos</a>";
                        }
                    ?>
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
                    <?php
                     if($_SESSION['Perfil'] == "Administrador"){
                        echo  " <a href='./curso.php'>Cadastrar Curso</a>";
                    }
                    if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                        echo  "
                        <a href='./horario.php'>Cadastrar Horários</a>
                        <a href='./alunoHorario.php'>Cadastra Aluno em Horários</a>";
                    }
                    ?>
                        
                    </div>
            </li>
            <li style="cursor:pointer;"><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i>
                    <div id="barras">
                    <?php
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                            echo  "<a href='./mostrahorario.php'>Horário</a>
                            <a href='./propagandas.php'>Propragandas</a>";
                        }
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador"){
                            echo  "
                            <a href='./mostraCurso.php'>Curso</a>";
                        }
                    ?>
                    </div>
            </li>
            <li style="cursor:pointer;"><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i>
                        <div id="barras">
                        <?php
                        if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" ||  $_SESSION['Perfil'] == "Franqueado"){
                            echo  " <a href='./contratos.php'>Contratos</a>
                            <a href='./pagamentos.php'>Pagamentos</a>
                            <a href='./aniversariantes.php'>Aniversariantes</a>
                            <a href='./historico.php'>Históricos</a>";
                        }
                    ?>
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
                
                <h2><strong>Impressão</strong></h2>
                
                <a href='testedompdf.php?cpf=<?php echo $alunocpf; ?>' class='btn btn-success mr-2' style='background-color:blue;width:100px;height:60px;font-size:16px;color:white;'>Gerar Contrato</a>
                <a href='carneteste.php?cpf=<?php echo $alunocpf; ?>' class='btn btn-success mr-2' style='background-color:blue;width:100px;height:60px;font-size:16px;color:white;'>Gerar Carnê</a>
                <br>
            </div>
    </div>
</body>
</html>
