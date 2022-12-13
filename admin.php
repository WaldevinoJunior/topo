<? include("valida.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <li><a href="./index.html"><i class="bi bi-house"></i>Início</a></li>
            <li><a href=""><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a>Cadastrar Alunos</a>
                        <a>Listar alunos</a><hr>
                        <a>Cadastrar Colaboradores</a>
                        <a>Listar Colaboradores</a><hr>
                        <a>Cadastrar Horários</a>
                        <a>Salas</a>
                        <a>Maquínas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a>Pacotes</a>
                        <a>Cursos</a>
                        <a>Propragandas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-file-bar-graph"></i>Relatorios<i class="bi bi-caret-down"></i></a>
                        <div id="barras">
                        <a>Lista de Presença</a>
                        <a>Contratos</a>
                        <a>Pagamentos</a>
                        <a>Aniversariantes</a>
                        </div>
            </li>
            <li><a href=""><i class="bi bi-gear"></i>Manutenção<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a>Backup</a>
                        <a>Licença</a>
                        <a>Configurações</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
    </nav>
        <div class="admin">
            <div id="painel">
                <h2><strong>Administração</strong></h2>
            <div id="func">
                <div id="listaAlunos" style="display:none">
                    <p>Nome do aluno:<?  ?></p>
                </div>
                <div class="funcA">
                    <a onclick="mostraAlunos()"><i class="bi bi-person-fill" ></i><h3>Listar Alunos</h3></a>
                </div>
                <div class="funcA">
                    <a><i class="bi bi-person-plus fill"></i><h3>Cadastrar Alunos</h3></a>
                </div>
                <div class="funcA">
                    <a><i class="bi bi-postcard"></i><h3>Satisfação</h3></a>
                </div>
                <div class="funcA">
                    <a><i class="bi bi-clipboard fill"></i><h3>Licença</h3></a>
                </div>
                <div class="funcA">
                    <a><i class="bi bi-arrow-counterclockwise"></i><h3>Fazer Backup</h3></a>
                </div>
                <div class="funcA">
                    <a><i class="bi bi-people fill"></i><h3>Colaboradores</h3></a>
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
