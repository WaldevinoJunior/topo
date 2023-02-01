<?php 
    include("valida.php");
    $consultaAfiliados = "SELECT * from afiliados";
    $consultaFranq = "SELECT * from franqueados";
    
    $conAfiliados = $mysqli->query($consultaAfiliados) or die($mysqli->error);
    $conAfiliados2 = $mysqli->query($consultaAfiliados) or die($mysqli->error);
    $conFranq = $mysqli->query($consultaFranq) or die($mysqli->error);
    $conFranq2 = $mysqli->query($consultaFranq) or die($mysqli->error);

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
                        <a href="./sat.php">Satisfação</a>lunoslunos
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
                <div id="listaAlunos"  class="listAlunos">
                <div class="cont-header" id="cbcLista">
                    
                    <h1>Lista de Afiliados e Franqueados</h1>
                    <form action="buscarAfiliados.php" method="POST">
                    <select name='aluno'>
                        <?php
                         while($cAfiliados = mysqli_fetch_array($conAfiliados2)){
                            echo "<option id='busca' value='".$cAfiliados['ID_afiliados']."'>".$cAfiliados['Nome']." - ".$cAfiliados['CNPJ']."</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-success btn-sm" style='background-color:blue;margin-top:10px;font-size:15px' name="buscaAluno" value='Buscar'></input>
                    </form>
                    <a href="./admin.php" class="btn btn-success btn-sm" style="background-color:blue;margin-top:10px">Voltar</a>
                </div>

                <div class="content" style="overflow-y: scroll;height:300px;display:flex">   
                    <?php
                       $table = '<table class="table table-striped" id="tableAF">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>ID</th>';
                                   $table .= '<th>Nome</th>';
                                   $table .= '<th>Perfil</th>';
                                   $table .= '<th class="esconde">CNPJ</th>';
                                   $table .= '<th class="esconde">Telefone</th>';
                                $table .= '<th>Funções</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
           
                                while($cAfiliados = mysqli_fetch_array($conAfiliados)){
                                    $table .= "<tr class='alunoBusca'  name=".$cAfiliados['ID_afiliados'].">";
                                        $table .= "<td>{$cAfiliados['ID_afiliados']}</td>";
                                        $table .= "<td>{$cAfiliados['Nome']}</td>";
                                        $table .= "<td>Afiliado</td>";
                                        $table .= "<td class='esconde'>{$cAfiliados['CNPJ']}</td>";
                                        $table .= "<td class='esconde'>{$cAfiliados['Telefone']}</td>";
                                        $table .= "<td><button onclick='EditarAfiliado".$cAfiliados['ID_afiliados']."();''style = 'margin:10px;'class='btn btn-primary btn-sm' value='".$cAfiliados['ID_afiliados']."'>Editar</button><form action='valida.php' method='POST'><input style='display:none' value='".$cAfiliados['ID_afiliados']."' name='idafiliado'/><input type='submit' class='btn btn-danger btn-sm' style='width:70px' name='deletaAfiliado' value='Deletar'></input></form></td>";
                                        $table .= '</tr>';

                                        echo "<script>
                                            function EditarAfiliado".$cAfiliados['ID_afiliados']."(){
    
                                                document.getElementById('EditarAfiliado".$cAfiliados['ID_afiliados']."').style.display = 'block';
                                                document.getElementById('tableAF').style.display = 'none';
                                                document.getElementById('cbcLista').style.display = 'none';
                                             
                                            }
                                        </script>";
                                        echo "<div id='EditarAfiliado".$cAfiliados['ID_afiliados']."' style='display:none;'>
                                        <div id= 'dadosDoAluno' style='padding:10px;'>
                                        <h3>Dados do Afiliado</h3>
                                        <p>Preencha somente os dados que você quiser alterar</p>
                                        <form method='post' action='valida.php'>
                                            <input type='hidden' name='_token' value='WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY'>
                                            <div class='row'>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='nome'>Nome</label>
                                                    <input type='text' class='form-control' id='nome".$cAfiliados['ID_afiliados']."' name='nome'  value ='".$cAfiliados['Nome']."''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='CPF'>CPF</label>
                                                    <input type='text' class='form-control' id='cpf".$cAfiliados['ID_afiliados']."' name='cpf' value ='".$cAfiliados['CPF']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='CNPJ'>CNPJ</label>
                                                    <input type='text' class='form-control' id='cnpj".$cAfiliados['ID_afiliados']."' name='cnpj' value ='".$cAfiliados['CNPJ']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='email'>Email</label>
                                                    <input type='email' class='form-control' id='email".$cAfiliados['ID_afiliados']."' name='email' value ='".$cAfiliados['Email']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='tel'>Telefone</label>
                                                    <input type='text' class='form-control' id='tel".$cAfiliados['ID_afiliados']."' name='telefone' value ='".$cAfiliados['Telefone']."'>
                                                </div>
                                                
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cep'>CEP</label>
                                                    <input type='text' class='form-control' id='cep".$cAfiliados['ID_afiliados']."' name='cep' value ='".$cAfiliados['CEP']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='estado'>Estado</label>
                                                    <input type='text' class='form-control' id='estado".$cAfiliados['ID_afiliados']."' name='estado' value ='".$cAfiliados['Estado']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cidade'>Cidade</label>
                                                    <input type='text' class='form-control' id='cidade".$cAfiliados['ID_afiliados']."' name='cidade' value ='".$cAfiliados['Cidade']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='rua'>Rua</label>
                                                    <input type='text' class='form-control' id='rua".$cAfiliados['ID_afiliados']."' name='rua'value ='".$cAfiliados['Rua']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='numero'>Número</label>
                                                    <input type='text' class='form-control' id='numero".$cAfiliados['ID_afiliados']."' name='numero' value ='".$cAfiliados['Numero']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='bairro'>Bairro</label>
                                                    <input type='text' class='form-control' id='bairro".$cAfiliados['ID_afiliados']."' name='bairro' value ='".$cAfiliados['Bairro']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='login'>Login</label>
                                                    <input type='text' class='form-control' id='login".$cAfiliados['ID_afiliados']."' name='login' value ='".$cAfiliados['Login']."'>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='senha'>Senha</label>
                                                    <input type='text' class='form-control' id='senha".$cAfiliados['ID_afiliados']."' name='senha' value ='".$cAfiliados['Senha']."'>
                                                </div>
                                                <input type='text' name='id' style='display:none;' value='".$cAfiliados['ID_afiliados']."'>
                                            </div>
            
                           
                                            <div class='d-flex justify-content-center'>
                                            <a onclick='volta".$cAfiliados['ID_afiliados']."()' class='btn btn-success mr-2' style='background-color:blue;width:70px;height:40px;font-size:16px;color:white;'>Voltar</a>
                                            <script>
                                            function volta".$cAfiliados['ID_afiliados']."(){
                                                window.scrollTo(0, 0);
                                                document.getElementById('EditarAfiliado".$cAfiliados['ID_afiliados']."').style.display = 'none';
                                                document.getElementById('tableAF').style.display = 'block';
                                                document.getElementById('cbcLista').style.display = 'block';
                                                
                                            }
                                            </script>

                                                <input class='btn btn-success mr-2'type='submit' value='Enviar' name='enviareditarColab'>
                                            </div>
                                        </form>
                                    </div>     
                                </div>";
                                   

                            } 
                            while($cFranq = mysqli_fetch_array($conFranq)){
                                $table .= "<tr class='alunoBusca'  name=".$cFranq['ID_franqueados'].">";
                                    $table .= "<td>{$cFranq['ID_franqueados']}</td>";
                                    $table .= "<td>{$cFranq['Nome']}</td>";
                                    $table .= "<td>Franqueado</td>";
                                    $table .= "<td class='esconde'>{$cFranq['CNPJ']}</td>";
                                    $table .= "<td class='esconde'>{$cFranq['Telefone']}</td>";
                                    $table .= "<td><button href='editarFranq.php?franqueadoid=".$cFranq['ID_franqueados']."'style = 'margin:10px;'class='btn btn-primary btn-sm' value='".$cFranq['ID_franqueados']."'>Editar</button><form action='valida.php' method='POST'><input style='display:none' value='".$cFranq['ID_franqueados']."' name='idfranqueado'/><input type='submit' class='btn btn-danger btn-sm' style='width:70px' name='deletaFranqueado' value='Deletar'></input></form></td>";

                                    // $table .= "<td><a href='editarFranq.php?franqueadoid=".$cFranq['ID_franqueados']."' style='background-color:blue;border:1px solid black;color:white;font-size:15px;margin-top:9px;padding:2.2px' value='".$cFranq['ID_franqueados']."'>Editar</a></td>";
                                    // $table .= "<td><form action='valida.php' method='POST'><input style='display:none' value='".$cFranq['ID_franqueados']."' name='idfranqueado'/><input type='submit' class='btn btn-danger btn-sm' style='width:70px' name='deletaFranqueado' value='Deletar'></input></form></td>";
                                     $table .= '</tr>';
                                    
                               

                        } 
                        $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
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