<?php
    include("valida.php");
     $consultaAlunos = "SELECT * from alunos WHERE ID_Aluno = '{$_GET['alunoid']}'";
     $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
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
            <div id="func">
            <?php
    while($cAlunos = mysqli_fetch_array($conAlunos)){
        echo "<div id='EditarAlunos".$cAlunos['ID_Aluno']."'>
        <div id= 'dadosDoAluno' style='padding:10px;'>
        <h3>Dados do aluno</h3>
        <p>Preencha somente os dados que você quiser alterar</p>
        <form method='post' action='valida.php'>
            <input type='hidden' name='_token' value='WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY'>
            <div class='row'>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Nome</label>
                    <input type='text' class='form-control' id='nome".$cAlunos['ID_Aluno']."' name='nome'  value ='".$cAlunos['Nome']."''>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Responsável</label>
                    <input type='text' class='form-control' id='resp".$cAlunos['ID_Aluno']."' name='resp'  value ='".$cAlunos['Responsavel_2']."''>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nome'>Responsável Telefone</label>
                    <input type='text' class='form-control' id='respT".$cAlunos['ID_Aluno']."' name='respT'  value ='".$cAlunos['Responsavel_numero']."''>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='nasc'>Data de Nasc.</label>
                    <input type='date' class='form-control' id='nascimento".$cAlunos['ID_Aluno']."' name='nascimento' value ='".$cAlunos['Nascimento']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='email'>Email</label>
                    <input type='email' class='form-control' id='email".$cAlunos['ID_Aluno']."' name='email' value ='".$cAlunos['Email']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='tel'>Telefone</label>
                    <input type='text' class='form-control' id='tel".$cAlunos['ID_Aluno']."' name='telefone' value ='".$cAlunos['Telefone']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cpf'>CPF</label>
                    <input type='text' class='form-control' id='cpf".$cAlunos['ID_Aluno']."' name='cpf' value ='".$cAlunos['CPF']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='rg'>RG</label>
                    <input type='text' class='form-control' id='rg".$cAlunos['ID_Aluno']."' name='rg' value ='".$cAlunos['RG']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cep'>CEP</label>
                    <input type='text' class='form-control' id='cep".$cAlunos['ID_Aluno']."' name='cep' value ='".$cAlunos['CEP']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='estado'>Estado</label>
                    <input type='text' class='form-control' id='estado".$cAlunos['ID_Aluno']."' name='estado' value ='".$cAlunos['Estado']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='cidade'>Cidade</label>
                    <input type='text' class='form-control' id='cidade".$cAlunos['ID_Aluno']."' name='cidade' value ='".$cAlunos['Cidade']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='rua'>Rua</label>
                    <input type='text' class='form-control' id='rua".$cAlunos['ID_Aluno']."' name='rua'value ='".$cAlunos['Rua']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='numero'>Número</label>
                    <input type='text' class='form-control' id='numero".$cAlunos['ID_Aluno']."' name='numero' value ='".$cAlunos['Numero']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='complemento'>Complemento</label>
                    <input type='text' class='form-control' id='complemento".$cAlunos['ID_Aluno']."' name='complemento' value ='".$cAlunos['Complemento']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                    <label for='senha'>Senha</label>
                    <input type='text' class='form-control' id='senha".$cAlunos['ID_Aluno']."' name='senha' value ='".$cAlunos['Senha']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                <label for='login'>Login</label>
                <input type='text' class='form-control' id='login".$cAlunos['ID_Aluno']."' name='login' value ='".$cAlunos['Login']."'>
                </div>
                <div class='form-group col-12 col-lg-6'>
                <label for='login'>Status:</label><br>
                <input type='radio' id='login".$cAlunos['ID_Aluno']."' name='status' value ='1'>Cursando</input><br>
                <input type='radio' id='login".$cAlunos['ID_Aluno']."' name='status' value ='2'>Concluído</input><br>
                <input type='radio' id='login".$cAlunos['ID_Aluno']."' name='status' value ='3'>Cancelado</input><br>
                <input type='radio' id='login".$cAlunos['ID_Aluno']."' name='status' value ='4'>Bloqueado</input><br>
                </div>
                <input type='text' name='id' style='display:none;' value='".$cAlunos['ID_Aluno']."'>
            </div>


            <div class='d-flex justify-content-center'>
            <a href='listaAluno.php' class='btn btn-success mr-2' style='background-color:blue;width:70px;height:40px;font-size:16px;color:white;'>Voltar</a>
           
                <input class='btn btn-success mr-2'type='submit' value='Enviar' name='enviareditarAluno'>
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
