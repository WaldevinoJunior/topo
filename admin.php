<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
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
            <li><a href=""><i class="bi bi-house"></i>Início</a></li>
            <li><a href=""><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a>Cadastrar Alunos</a>
                        <a>Listar alunos</a><hr>
                        <a>Cadastrar Colaboradores</a>
                        <a>Listar Colaboradores</a><hr>
                        <a>Cadastrar Horários</a>
                        <a>Salas</a>
                        <a>Máquinas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a>Pacotes</a>
                        <a>Cursos</a>
                        <a>Propragandas</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-file-bar-graph"></i>Relatórios<i class="bi bi-caret-down"></i></a>
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
            <li><a href="./index.html"><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
    </nav>
        <div class="admin">
            <div id="painel">
                <h2><strong>Administração</strong></h2>
            <div id="func">
                <div id="listaAlunos" style="display:none">
                <div class="content"> 
                    <?php
                       $table = '<table class="rTable">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>ID</th>';
                                   $table .= '<th>Nome</th>';
                                   $table .= '<th>Responsável</th>';
                                   $table .= '<th>Nascimento</th>';
                                   $table .= '<th>Email</th>';
                                   $table .= '<th>Telefone</th>';
                                   $table .= '<th>CPF</th>';
                                   $table .= '<th>RG</th>';
                                   $table .= '<th>CEP</th>';
                                   $table .= '<th>Estado</th>';
                                   $table .= '<th>Cidade</th>';
                                   $table .= '<th>Rua</th>';
                                   $table .= '<th>Número</th>';
                                   $table .= '<th>Senha</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
           
                                while($cAlunos = mysqli_fetch_array($conAlunos)){
                                    $table .= '<tr>';
                                        $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                                        $table .= "<td>{$cAlunos['Nome']}</td>";
                                        $table .= "<td>{$cAlunos['Responsavel']}</td>";
                                        $table .= "<td>{$cAlunos['Nascimento']}</td>";
                                        $table .= "<td>{$cAlunos['Email']}</td>";
                                        $table .= "<td>{$cAlunos['Telefone']}</td>";
                                        $table .= "<td>{$cAlunos['CPF']}</td>";
                                        $table .= "<td>{$cAlunos['RG']}</td>";
                                        $table .= "<td>{$cAlunos['CEP']}</td>";
                                        $table .= "<td>{$cAlunos['Estado']}</td>";
                                        $table .= "<td>{$cAlunos['Cidade']}</td>";
                                        $table .= "<td>{$cAlunos['Rua']}</td>";
                                        $table .= "<td>{$cAlunos['Numero']}</td>";
                                        $table .= "<td>{$cAlunos['Senha']}</td>";
                                    $table .= '</tr>';

                                } 
                            $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
                </div>
                </div>
                <div id="listaColaboradores" style="display:none">
                <div class="content"> 
                    <?php
                       $table = '<table class="rTable">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>ID</th>';
                                   $table .= '<th>Nome</th>';
                                   $table .= '<th>Nascimento</th>';
                                   $table .= '<th>Email</th>';
                                   $table .= '<th>Telefone</th>';
                                   $table .= '<th>CEP</th>';
                                   $table .= '<th>Estado</th>';
                                   $table .= '<th>Cidade</th>';
                                   $table .= '<th>Rua</th>';
                                   $table .= '<th>Número</th>';
                                   $table .= '<th>Complemento</th>';
                                   $table .= '<th>Login</th>';
                                   $table .= '<th>Senha</th>';
                                   $table .= '<th>Perfil</th>';
                                   $table .= '<th>Licença</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
           
                                while($cColab = mysqli_fetch_array($conColab)){
                                    $table .= '<tr>';
                                        $table .= "<td>{$cColab['ID_Colaborador']}</td>";
                                        $table .= "<td>{$cColab['Nome']}</td>";
                                        $table .= "<td>{$cColab['Nascimento']}</td>";
                                        $table .= "<td>{$cColab['Email']}</td>";
                                        $table .= "<td>{$cColab['Telefone']}</td>";
                                        $table .= "<td>{$cColab['CEP']}</td>";
                                        $table .= "<td>{$cColab['Estado']}</td>";
                                        $table .= "<td>{$cColab['Cidade']}</td>";
                                        $table .= "<td>{$cColab['Rua']}</td>";
                                        $table .= "<td>{$cColab['Numero']}</td>";
                                        $table .= "<td>{$cColab['Complemento']}</td>";
                                        $table .= "<td>{$cColab['Login']}</td>";
                                        $table .= "<td>{$cAlunos['Senha']}</td>";
                                        $table .= "<td>{$cColab['Perfil']}</td>";
                                        $table .= "<td>{$cColab['Licenca']}</td>";
                                    $table .= '</tr>';

                                } 
                            $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
                </div>
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
                    <a onclick="mostraColaboradores()"><i class="bi bi-people fill"></i><h3>Colaboradores</h3></a>
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
