<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conCursos = $mysqli->query($consultaCursos) or die($mysqli->error);
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
        <img src="img/iconetopo.jpg">
        <ul>
            <li><a href="./admin.php"><i class="bi bi-house"></i>Início</a></li>
            <li><a href=""><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./cadastraAluno.php">Cadastrar Alunos</a>
                        <a href="./listaAlunos.php">Listar alunos</a><hr>
                        <a href="./cadastraColab.php">Cadastrar Colaboradores</a>
                        <a href="./listaColab.php">Listar Colaboradores</a>
                        <a href="./horario.php">Cadastrar Horários</a>
                        <a href="./salas.php">Salas</a>
                        <a href="./maquinas.php">Máquinas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./pacotes.php">Pacotes</a>
                        <a href="./cursos.php">Cursos</a>
                        <a href="./propagandas.php">Propragandas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i></a>
                        <div id="barras">
                            <a href="./presenca.php">Lista de Presença</a>
                            <a href="./contratos.php">Contratos</a>
                            <a href="./pagamentos.php">Pagamentos</a>
                            <a href="./aniversariantes.php">Aniversariantes</a>
                        </div>
            </li>
            <li><a href=""><i class="bi bi-gear"></i>Manutenção<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./backup.php">Backup</a>
                        <a href="./licenca">Licença</a>
                        <a href="./sat.php">Satisfação</a>
                    </div>
            </li>
            <li><a href="./index.html"><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
    </nav>
        <div class="admin">
            <div id="painel">
                <h2><strong>Administração</strong></h2>
                <!-- <a href="admin.php" class="btn btn-primary btn-sm">Voltar</a> -->
            <div id="func">
                <div id="cadastraColab">
                    <div class="cont-header">
                    </div>
                    <div class="content">
                        <div id="dadosDoAluno" class="" style="padding:10px;">
                            <h3>Preencha os dados do Curso</h3>
                            <form method="post" action="valida.php">
                                <input type="hidden" name="_token" value="WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="" required>
                                    </div>
                                    
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="preco">Preço</label>
                                        <input type="text" class="form-control" id="tel" name="preco" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="horas">Carga horária</label>
                                        <input type="number" class="form-control" id="cpf" name="horas" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control" id="cep" name="descricao" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="aulas">Aulas Totais</label>
                                        <input type="number" class="form-control" id="senha" name="aulas" placeholder="" required>
                                    </div>
                                </div>

                <!--BOTOES AO FIM DA SESSÃO-->
                                <div class="d-flex justify-content-center">
                                <a href="./admin.php" class="btn btn-success mr-2" style="display:flex;background-color:blue;width:60px;height:40px;;font-size:15px;color:white;">Voltar</a>
                                <input class="btn btn-success mr-2" type="submit" value="Enviar" name="cadastraCurso">
                                </div>
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