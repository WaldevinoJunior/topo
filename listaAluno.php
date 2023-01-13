<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conAlunos2 = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
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
                        <a href="./alunoCurso.php">Cadastrar Aluno em Curso</a>
                        <a href="./curso.php">Cadastrar Curso</a>
                        <a href="./horario.php">Cadastrar Horários</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./propagandas.php">Propragandas</a>
                        <a href="./salas.php">Salas</a>
                        <a href="./maquinas.php">Máquinas</a>
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
                <div id="listaAlunos"  class="listAlunos">
                <div class="cont-header" id="cbcLista">
                    <h1>Lista de alunos</h1>
                    <form action="buscarAluno.php" method="POST">
                    <select name='aluno'>
                        <?php
                         while($cAlunos = mysqli_fetch_array($conAlunos2)){
                            echo "<option id='busca' value='".$cAlunos['ID_Aluno']."'>".$cAlunos['Nome']." - ".$cAlunos['CPF']."</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-success btn-sm" style='background-color:blue;margin-top:10px;font-size:15px' name="buscaAluno" value='Buscar'></input>
                    </form>
                    <a href="./admin.php" class="btn btn-success btn-sm" style="background-color:blue;margin-top:10px">Voltar</a>
                </div>

                <div class="content" style="overflow-y: scroll;height:300px">   
                    <?php
                       $table = '<table class="table table-striped" id="tableAluno">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>ID</th>';
                                   $table .= '<th>Nome</th>';
                                //    $table .= '<th>Responsável</th>';
                                   $table .= '<th>Nascimento</th>';
                                   $table .= '<th>Email</th>';
                                   $table .= '<th>Telefone</th>';
                                //    $table .= '<th>CPF</th>';
                                //    $table .= '<th>RG</th>';
                                //    $table .= '<th>CEP</th>';
                                //    $table .= '<th>Estado</th>';
                                //    $table .= '<th>Cidade</th>';
                                //    $table .= '<th>Rua</th>';
                                //    $table .= '<th>Número</th>';
                                //    $table .= '<th>Senha</th>';
                                $table .= '<th>Funções</th>';
                                $table .= '<th>Curso</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
           
                                while($cAlunos = mysqli_fetch_array($conAlunos)){
                                    $table .= "<tr class='alunoBusca'  name=".$cAlunos['ID_Aluno'].">";
                                        $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                                        $table .= "<td>{$cAlunos['Nome']}</td>";
                                        // $table .= "<td>{$cAlunos['Responsavel']}</td>";
                                        $table .= "<td>{$cAlunos['Nascimento']}</td>";
                                        $table .= "<td>{$cAlunos['Email']}</td>";
                                        
                                         $table .= "<td>{$cAlunos['Telefone']}</td>";
                                        // $table .= "<td>{$cAlunos['CPF']}</td>";
                                        // $table .= "<td>{$cAlunos['RG']}</td>";
                                        // $table .= "<td>{$cAlunos['CEP']}</td>";
                                        // $table .= "<td>{$cAlunos['Estado']}</td>";
                                        // $table .= "<td>{$cAlunos['Cidade']}</td>";
                                        // $table .= "<td>{$cAlunos['Rua']}</td>";
                                        // $table .= "<td>{$cAlunos['Numero']}</td>";
                                        // $table .= "<td>{$cAlunos['Senha']}</td>";
                                        $table .= "<td><button onclick='editarAlunos".$cAlunos['ID_Aluno']."();'style = 'margin:10px;'class='btn btn-primary btn-sm'value='".$cAlunos['ID_Aluno']."'>Editar</button></td>";
                                        $table .= "<td><a style='background-color:green;border:1px solid black;color:white;font-size:15px;margin-top:9px;padding:2.2px' href='cursoAluno.php?alunoid=".$cAlunos['ID_Aluno']."&&nome=".$cAlunos['Nome']."' style = 'margin:10px;font-size:15px;' 'value='".$cAlunos['ID_Aluno']."'>Adicionar</a></td>";
                                        $table .= '</tr>';
                                    
                                   

                            } 
                        $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
                </div>
                </div>
                 
                
                <div id="listaColaboradores" class="listColab" style="display:none">
                <div class="cont-header" id="cbcLista2">
                    <h1>Lista de colaboradores</h1>
                    <a onclick="voltaAdmin4()" class="btn btn-success btn-sm" style="background-color:blue;">Voltar</a>
                </div>
                <div class="content"> 
                    <?php
                       $table = '<table class="table table-striped" id="tableColab">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>ID</th>';
                                   $table .= '<th>Nome</th>';
                                   $table .= '<th>Nascimento</th>';
                                   $table .= '<th>Email</th>';
                                   $table .= '<th>Telefone</th>';
                                //    $table .= '<th>CEP</th>';
                                //    $table .= '<th>Estado</th>';
                                //    $table .= '<th>Cidade</th>';
                                //    $table .= '<th>Rua</th>';
                                //    $table .= '<th>Número</th>';
                                //    $table .= '<th>Complemento</th>';
                                //    $table .= '<th>Login</th>';
                                //    $table .= '<th>Senha</th>';
                                   $table .= '<th>Perfil</th>';
                                   //$table .= '<th>Licença</th>';
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
                                        // $table .= "<td>{$cColab['CEP']}</td>";
                                        // $table .= "<td>{$cColab['Estado']}</td>";
                                        // $table .= "<td>{$cColab['Cidade']}</td>";
                                        // $table .= "<td>{$cColab['Rua']}</td>";
                                        // $table .= "<td>{$cColab['Numero']}</td>";
                                        // $table .= "<td>{$cColab['Complemento']}</td>";
                                        // $table .= "<td>{$cColab['Login']}</td>";
                                        // $table .= "<td>{$cColab['Senha']}</td>";
                                        $table .= "<td>{$cColab['Perfil']}</td>";
                                        //$table .= "<td>{$cColab['Licenca']}</td>";
                                        $table .= "<td><button onclick='EditarColab".$cColab['ID_Colaborador']."();' style = 'margin:10px;'class='btn btn-primary btn-sm'>Editar</button><button class='btn btn-danger btn-sm' onclick='deletarColab();'>Deletar</button></td>";
                                        $table .= '</tr>';
                                } 
                            $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>

                <hr>
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