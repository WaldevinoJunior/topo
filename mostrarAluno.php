<?php
    include("valida.php");
     $consultaAlunos = "SELECT * from alunos WHERE ID_Aluno = '{$_GET['alunoid']}'";
     $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
     $consultaPro = "SELECT ID_Curso FROM aluno_curso_progressos WHERE ID_Aluno = '{$_GET['alunoid']}'";
     $conPro = $mysqli->query($consultaPro) or die($mysqli->error);
     $consultaHo = "SELECT ID_Horario FROM horarios_alunos WHERE ID_Aluno = '{$_GET['alunoid']}'";
     $conHo = $mysqli->query($consultaHo) or die($mysqli->error);
     $consultaColab = "SELECT * from colaboradores";
     $consultaCursos = "SELECT * from cursos";
     $consultaHorario = "SELECT * from horarios";
     $conHorario = $mysqli->query($consultaHorario) or die($mysqli->error);
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
            <?php
    while($cAlunos = mysqli_fetch_array($conAlunos)){
        echo "<div id='EditarAlunos".$cAlunos['ID_Aluno']."'>
        <div id= 'dadosDoAluno' style='padding:10px;'>
        <h3>Dados do aluno</h3>
        <form method='post' action='valida.php'>
            <input type='hidden' name='_token' value='WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY'>
            <div class='row'>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Nome</label>
                    <p>".$cAlunos['Nome']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Responsável</label>
                    <p>".$cAlunos['Responsavel_2']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Telefone do Responsável</label>
                    <p>".$cAlunos['Responsavel_numero']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nasc'>Data de Nasc.</label>
                    <p>".$cAlunos['Nascimento']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='email'>Email</label>
                    <p>".$cAlunos['Email']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='tel'>Telefone</label>
                    <p>".$cAlunos['Telefone']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cpf'>CPF</label>
                    <p>".$cAlunos['CPF']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='rg'>RG</label>
                    <p>".$cAlunos['RG']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cep'>CEP</label>
                    <p>".$cAlunos['CEP']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='estado'>Estado</label>
                    <p>".$cAlunos['Estado']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cidade'>Cidade</label>
                    <p>".$cAlunos['Cidade']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='rua'>Rua</label>
                    <p>".$cAlunos['Rua']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='numero'>Número</label>
                    <p>".$cAlunos['Numero']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='complemento'>Complemento</label>
                    <p>".$cAlunos['Complemento']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='senha'>Senha</label>
                    <p>".$cAlunos['Senha']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                <label for='login'>Login</label>
                <p>".$cAlunos['Login']."</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                <label for='login'>Status</label>
                <p>"; if($cAlunos['Status'] == 1){echo "Cursando";}if($cAlunos['Status'] == 2){echo "Concluído";}if($cAlunos['Status'] == 3){echo "Cancelado";}if($cAlunos['Status'] == 4){echo "Bloqueado";} echo"</p>
                </div>
                <div class='form-group col-12 col-lg-6'>
                <label for='login'>Cursos</label>
                <p>";
                $cursos = [];
                while($cPro = mysqli_fetch_array($conPro)){
                    $cursos[] = $cPro['ID_Curso'];
                }
                while($cC = mysqli_fetch_array($conCursos)){
                    for($i=0;$i<count($cursos);$i++){
                        if($cC['ID_Curso'] == $cursos[$i]){
                            echo $cC['Nome_curso']."<br>";}
                        }
                    } 
                    echo"</p>
                </div>
                <div class='form-group col-12 col-lg-6' id='horarioAluno'>
                <label for='login'>Horarios</label>
                <p>";
                $horarios = [];
                while($cHo = mysqli_fetch_array($conHo)){
                    $horarios[] = $cHo['ID_Horario'];
                }
                while($cC = mysqli_fetch_array($conHorario)){
                    for($i=0;$i<count($horarios);$i++){
                        if($cC['ID_Horario'] == $horarios[$i]){
                            echo $cC['Dia']."-".$cC['Hora_inicio']."-".$cC['Hora_fim']."<br>";}
                        }
                    } 
                    echo"</p>
                </div>
            </div>


            <div class='d-flex justify-content-center'>
            <a href='listaAluno.php' class='btn btn-success mr-2' style='background-color:blue;width:70px;height:40px;font-size:16px;color:white;'>Voltar</a>
            </div>
        </form>
    </div>     
    </div>";
    }

?>
            </div>
            <hr>
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
