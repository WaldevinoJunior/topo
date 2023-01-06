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
                        <a onclick="mostraAlunos()">Listar alunos</a><hr>
                        <a>Cadastrar Colaboradores</a>
                        <a onclick="mostraColaboradores()">Listar Colaboradores</a><hr>
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
                <!-- <a href="admin.php" class="btn btn-primary btn-sm">Voltar</a> -->
            <div id="func">
                <div id="listaAlunos" style="display:none" class="listAlunos">
                <div class="cont-header" id="cbcLista">
                    <h1>Lista de alunos</h1>
                    <a href="#" class="btn btn-success btn-sm">Cadastrar aluno</a>
                    <a href="#" class="btn btn-success btn-sm">Atualizar lista</a>
                </div>
                <div class="content">   
                    <?php
                       $table = '<table class="table table-striped" id="oi">';
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
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
           
                                while($cAlunos = mysqli_fetch_array($conAlunos)){
                                    $table .= '<tr>';
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
                                        $table .= "<td><button onclick='editarAlunos".$cAlunos['ID_Aluno']."();'style = 'margin:10px;'class='btn btn-primary btn-sm'value='".$cAlunos['ID_Aluno']."'>Editar</button><button class='btn btn-danger btn-sm' onclick='deletarAlunos();'>Deletar</button></td>";
                                    $table .= '</tr>';
                                    
                                    echo "<script>
                                            function editarAlunos".$cAlunos['ID_Aluno']."(){
    
                                                document.getElementById('EditarAlunos".$cAlunos['ID_Aluno']."').style.display = 'block';
                                                document.getElementById('oi').style.display = 'none';;
                                                document.getElementById('cbcLista').style.display = 'none';;
                                                // alert(value);
                                             
                                            }
                                        </script>";
                                       
                                        echo "<div id='EditarAlunos".$cAlunos['ID_Aluno']."' style='display:none;'>
                                        <div id= 'dadosDoAluno' style='padding:10px;'>
                                        <h3>Dados do aluno</h3>
                                        <p>Preencha somente os dados que você quiser alterar</p>
                                        <form method='post'>
                                            <input type='hidden' name='_token' value='WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY'>
                                            <div class='row'>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='nome'>Nome</label>
                                                    <input type='text' class='form-control' id='nome".$cAlunos['ID_Aluno']."' name='nome'  value ='".$cAlunos['Nome']."''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='nasc'>Data de Nasc.</label>
                                                    <input type='date' class='form-control' id='nascimento".$cAlunos['ID_Aluno']."' name='nascimento' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='email'>Email</label>
                                                    <input type='email' class='form-control' id='email".$cAlunos['ID_Aluno']."' name='email' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='tel'>Telefone</label>
                                                    <input type='text' class='form-control' id='tel".$cAlunos['ID_Aluno']."' name='telefone' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cpf'>CPF</label>
                                                    <input type='text' class='form-control' id='cpf".$cAlunos['ID_Aluno']."' name='cpf' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='rg'>RG</label>
                                                    <input type='text' class='form-control' id='rg".$cAlunos['ID_Aluno']."' name='rg' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cep'>CEP</label>
                                                    <input type='text' class='form-control' id='cep".$cAlunos['ID_Aluno']."' name='cep' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='estado'>Estado</label>
                                                    <input type='text' class='form-control' id='estado".$cAlunos['ID_Aluno']."' name='estado' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='cidade'>Cidade</label>
                                                    <input type='text' class='form-control' id='cidade".$cAlunos['ID_Aluno']."' name='cidade' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='rua'>Rua</label>
                                                    <input type='text' class='form-control' id='rua".$cAlunos['ID_Aluno']."' name='rua' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='numero'>Número</label>
                                                    <input type='text' class='form-control' id='numero".$cAlunos['ID_Aluno']."' name='numero' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='complemento'>Complemento</label>
                                                    <input type='text' class='form-control' id='complemento".$cAlunos['ID_Aluno']."' name='complemento' placeholder=''>
                                                </div>
                                                <div class='form-group col-12 col-lg-6'>
                                                    <label for='senha'>Senha</label>
                                                    <input type='password' class='form-control' id='senha".$cAlunos['ID_Aluno']."' name='senha' placeholder=''>
                                                </div>
                                            </div>
            
                           
                                            <div class='d-flex justify-content-center'>
                                                <button class='btn btn-success mr-2'>Salvar</button>
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
                 
                
                <div id="listaColaboradores" class="listColab" style="display:none">
                <div class="cont-header" id="cbcLista">
                    <h1>Lista de colaboradores</h1>
                    <a href="#" class="btn btn-success btn-sm">Cadastrar colaboradores</a>
                    <a href="#" class="btn btn-success btn-sm">Atualizar lista</a>
                </div>
                <div class="content"> 
                    <?php
                       $table = '<table class="table table-striped">';
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
                                   $table .= '<th>Funções</th>';
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
                                        $table .= "<td><button onclick='editarColab();' style = 'margin:10px;'class='btn btn-primary btn-sm'>Editar</button><button class='btn btn-danger btn-sm' onclick='deletarColab();'>Deletar</button></td>";
                                    $table .= '</tr>';

                                } 
                            $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   ?>
                </div>
                </div>
                <div id="EditarColab" style="display:none">
                    <div class="cont-header">
                        <h2>Editar Colaborador 1</h2> 
                        <!-- <button class="btn btn-primary btn-sm">Editar Dados</button> 
                        <button class="btn btn-primary btn-sm">Voltar</button>   
                          -->
                        
                    </div>
                    <div class="content">
                        <div id="dadosDoAluno" class="" style="padding:10px;">
                            <h3>Dados do colaborador</h3>
                            <p>Preencha somente os dados que você quiser alterar</p>
                            <form method="post" action="/listar-alunos/editar/254/dados">
                                <input type="hidden" name="_token" value="WmrC6gcNsjkmzVGYVTc9EemXmdDXh5Zavb5ywoMY">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="nasc">Data de Nasc.</label>
                                        <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="tel">Telefone</label>
                                        <input type="text" class="form-control" id="tel" name="telefone" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="">
                                    </div>
                                    <div class="form-group col-12 col-lg-6">
                                        <label for="rg">RG</label>
                                        <input type="text" class="form-control" id="rg" name="rg" placeholder="">
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
                                        <label for="login">Login</label>
                                        <input type="text" class="form-control" id="login" name="login" placeholder="">
                                    </div>

                                    <div class="form-group col-12 col-lg-6">
                                        <label for="senha">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                                    </div>
                                </div>

                <!--BOTOES AO FIM DA SESSÃO-->
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mr-2">Salvar</button>
                                </div>
                            </form>
                        </div>     
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
