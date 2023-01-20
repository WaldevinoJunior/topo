<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conAlunos2 = $mysqli->query($consultaAlunos) or die($mysqli->error);
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
        <img src="img/iconetopo.jpg">
        <ul id="mAdmin">
            <li><a href="./admin.php"><i class="bi bi-house"></i>Início</a></li>
            <li><a href=""><i class="bi bi-person-badge"></i>Cadastro<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./curso.php">Cadastrar Curso</a>
                        <a href="./horario.php">Cadastrar Horários</a>
                        <a href="./alunoHorario.php">Cadastra Aluno em Horários</a>
                    </div>
            </li>
            <li><a href=""><i class="bi bi-wrench"></i>Gerencia<i class="bi bi-caret-down"></i></a>
                    <div id="barras">
                        <a href="./mostrahorario.php">Horário</a>
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
                        <a href="valida.php?back">Backup</a>
                        <a href="./licenca">Licença</a>
                        <a href="./sat.php">Satisfação</a>
                    </div>
            </li>

            <li><a href="./valida.php?sair=true"><i class="bi bi-escape"></i>Sair</a></li>
        </ul>
        <img id="mAdmin2" src="img/apertomao.jpg"/>
    </nav>
        <div class="admin">
            <div id="painel">
                <h2><strong>Administração</strong></h2>
                <!-- <a href="admin.php" class="btn btn-primary btn-sm">Voltar</a> -->
            <div id="func">
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
                                    echo "<script>
                                            function EditarColab".$cColab['ID_Colaborador']."(){
    
                                                document.getElementById('EditarColab".$cColab['ID_Colaborador']."').style.display = 'block';
                                                document.getElementById('tableColab').style.display = 'none';
                                                document.getElementById('cbcLista2').style.display = 'none';
                                             
                                            }
                                        </script>";
                                       
                                        echo "<div id='EditarColab".$cColab['ID_Colaborador']."' style='display:none;'>
                                        <div id= 'dadosDoAluno' style='padding:10px;'>
                                        <h3>Dados do Colaborador</h3>
                                        <p>Preencha somente os dados que você quiser alterar</p>
                                        <form method='post' action='valida.php'>
                                            <input type='hidden' name='_token' value='WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY'>
                                            <div class='row'>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='nome'>Nome</label>
                                                    <input type='text' class='form-control' id='nome".$cColab['ID_Colaborador']."' name='nome'  value ='".$cColab['Nome']."''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='nasc'>Data de Nasc.</label>
                                                    <input type='date' class='form-control' id='nascimento".$cColab['ID_Colaborador']."' name='nascimento' value ='".$cColab['Nascimento']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='email'>Email</label>
                                                    <input type='email' class='form-control' id='email".$cColab['ID_Colaborador']."' name='email' value ='".$cColab['Email']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='tel'>Telefone</label>
                                                    <input type='text' class='form-control' id='tel".$cColab['ID_Colaborador']."' name='telefone' value ='".$cColab['Telefone']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='CPF'>CPF</label>
                                                    <input type='text' class='form-control' id='cpf".$cColab['ID_Colaborador']."' name='cpf' value ='".$cColab['CPF']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cep'>CEP</label>
                                                    <input type='text' class='form-control' id='cep".$cColab['ID_Colaborador']."' name='cep' value ='".$cColab['CEP']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='estado'>Estado</label>
                                                    <input type='text' class='form-control' id='estado".$cColab['ID_Colaborador']."' name='estado' value ='".$cColab['Estado']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cidade'>Cidade</label>
                                                    <input type='text' class='form-control' id='cidade".$cColab['ID_Colaborador']."' name='cidade' value ='".$cColab['Cidade']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='rua'>Rua</label>
                                                    <input type='text' class='form-control' id='rua".$cColab['ID_Colaborador']."' name='rua'value ='".$cColab['Rua']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='numero'>Número</label>
                                                    <input type='text' class='form-control' id='numero".$cColab['ID_Colaborador']."' name='numero' value ='".$cColab['Numero']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='complemento'>Complemento</label>
                                                    <input type='text' class='form-control' id='complemento".$cColab['ID_Colaborador']."' name='complemento' value ='".$cColab['Complemento']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='login'>Login</label>
                                                    <input type='text' class='form-control' id='login".$cColab['ID_Colaborador']."' name='login' value ='".$cColab['Login']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='senha'>Senha</label>
                                                    <input type='text' class='form-control' id='senha".$cColab['ID_Colaborador']."' name='senha' value ='".$cColab['Senha']."'>
                                                </div>
                                                <input type='text' name='id' style='display:none;' value='".$cColab['ID_Colaborador']."'>
                                            </div>
            
                           
                                            <div class='d-flex justify-content-center'>
                                            <a onclick='volta".$cColab['ID_Colaborador']."()' class='btn btn-success mr-2' style='background-color:blue;width:70px;height:40px;font-size:16px;color:white;'>Voltar</a>
                                            <script>
                                            function volta".$cColab['ID_Colaborador']."(){
                                                window.scrollTo(0, 0);
                                                document.getElementById('EditarColab".$cColab['ID_Colaborador']."').style.display = 'none';
                                                document.getElementById('tableColab').style.display = 'block';
                                                document.getElementById('cbcLista2').style.display = 'block';
                                                
                                            }
                                            </script>

                                                <input class='btn btn-success mr-2'type='submit' value='Enviar' name='enviareditarColab'>
                                            </div>
                                        </form>
                                    </div>     
                                </div>";

                                } 
                            $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
                </div>
                </div>
                <div id="cadastraColab" style="display:none">
                    <div class="cont-header">
                    </div>
                    <div class="content">
                        <div id="dadosDoAluno" class="" style="padding:10px;">
                            <h3>Preencha os dados do Colaborador</h3>
                            <form method="post" action="valida.php">
                                <input type="hidden" name="_token" value="WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nasc">Data de Nasc.</label>
                                        <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="tel">Telefone(Somente Números)</label>
                                        <input type="number" class="form-control" id="tel" name="telefone" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cpf">CPF(Somente Números)</label>
                                        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cidade">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="rua">Rua</label>
                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" id="numero" name="numero" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="complemento">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="senha">Login</label>
                                        <input type="text" minlength="5"  class="form-control" id="login" name="login" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="senha">Senha</label>
                                        <input type="text" minlength="5" class="form-control" id="senha" name="senha" placeholder="" required>
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="perfil">Perfil</label><br>
                                        <input type="radio"  id="perfil" name="perfil" value="Administrador" placeholder="" required>Administrador</input><br>
                                        <input type="radio"id="perfil" name="perfil" value="Coordenador" placeholder="" required>Coordenador</input><br>
                                        <input type="radio" id="perfil" name="perfil" value="Instrutor" placeholder="" required>Instrutor</input><br>
                                        <input type="radio"  id="perfil" name="perfil" value="Comercial" placeholder="" required>Comercial</input>
                                    </div>
                                </div>

                <!--BOTOES AO FIM DA SESSÃO-->
                                <div class="d-flex justify-content-center">
                                <a onclick="voltaAdmin3()" class="btn btn-success mr-2" style="display:flex;background-color:blue;width:60px;height:40px;;font-size:15px;color:white;">Voltar</a>
                                <input class="btn btn-success mr-2" type="submit" value="Enviar" name="cadastraColab">
                                </div>
                            </form>
                        </div>     
                    </div>
                </div>

              
                
                <div class="funcA" <?php if($_SESSION['Perfil'] != "Administrador"){echo "style='margin-left:100px'";}?>>
                    <a href="./listaAluno.php"><i class="bi bi-person"></i><h3>Listar Alunos</h3></a>
                </div>
                <div class="funcA">
                    <a  href="./cadastraAluno.php"><i class="bi bi-person-plus fill"></i><h3>Cadastrar Alunos</h3></a>
                </div>
                <div class="funcA">
                    <a href="./listaPresenca.php"><i class="bi bi-postcard"></i><h3>Lista de Presença</h3></a>
                </div>
                <div class="funcA">
                    <?php
                        if($_SESSION['Perfil'] == "Administrador"){
                            echo  "<a onclick='mostraColaboradores()'><i class='bi bi-people fill'></i><h3>Listar Colaboradores</h3></a>";
                        }
                    ?>
                </div>
                <div class="funcA">
                <?php
                        if($_SESSION['Perfil'] == "Administrador"){
                            echo  "<a onclick='cadastraColab()'><i class='bi bi-person-fill-add'></i><h3>Cadastrar Colaboradores</h3></a>";
                        }
                    ?>
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
