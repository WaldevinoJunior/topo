<?php 
    include("valida.php");
    session_start();
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
                <h2><strong>Administração</strong></h2>
                <!-- <a href="admin.php" class="btn btn-primary btn-sm">Voltar</a> -->
            <div id="func">
            <div id="cadastraAluno">
                    <div class="cont-header">
                    </div>
                    <div class="content">
                        <div id="dadosDoAluno" class="" style="padding:10px;">
                            <h3>Preencha os dados do Afiliado</h3>
                            <form method="post" action="valida.php">
                                <input type="hidden" name="_token" value="WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nome">Validade</label>
                                        <input type="date" class="form-control" id="nome" name="validade" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nome">Quantidade</label>
                                        <input type="number" min="0" class="form-control" id="nome" name="quantidade" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cpf">Curso</label>
                                        <select name="idCurso">
                                        <option value="0">Geral</option>
                                        <?php
                                        $curso = "SELECT * FROM cursos";
                                        $cursosql = $mysqli->query($curso) or die($mysqli->error);
                                        while($c = mysqli_fetch_array($cursosql)){
                                            echo "<option value=".$c['ID_Curso'].">".$c['Nome_curso']."</option>";
                                        }
                                        
                                        ?>
                                        </select>                                   
                                     </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cnpj">Código</label>
                                        <input type="text" class="form-control" name="codigo" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cnpj">Desconto</label>
                                        
                                        <select name="desconto">
                                        <option value="0.05">5%</option>
                                        <option value="0.1">10%</option>
                                        <option value="0.15">15%</option>
                                        <option value="0.20">20%</option>
                                        <option value="0.30">30$</option>
                                        <option value="0.5">50%</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cnpj">Afiliados/Podium</label>
                                        <select name="afiliados">
                                        <option value="0">Grupo Podium</option>
                                        <?php
                                        $afiliados = "SELECT * FROM afiliados";
                                        $afi = $mysqli->query($afiliados) or die($mysqli->error);
                                        while($a = mysqli_fetch_array($afi)){
                                            echo "<option value=".$a['ID_afiliados'].">".$a['Nome']."-".$a['Login']."</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                <!--BOTOES AO FIM DA SESSÃO-->
                                <div class="d-flex justify-content-center">
                                <a  href="./cupons.php" class="btn btn-success mr-2" style="display:flex;background-color:blue;width:70px;height:40px;font-size:16px;color:white;">Voltar</a>

                                <input class="btn btn-success mr-2" type="submit" value="Enviar" name="cadastraCupom">
                                </div>
                            </form>
                        </div>     
                    </div>
            <hr>
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