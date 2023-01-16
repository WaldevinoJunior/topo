<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultapro = "SELECT * from aluno_curso_progressos";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conPro = $mysqli->query($consultapro) or die($mysqli->error);
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
            <div id="listaAlunos" class="listAlunos">
                <div class="cont-header" id="cbcLista">
                    <h1>Cadastre o aluno <?php echo $_GET['nome'] ?> em um Curso ou mais:</h1>
                    <a href="./listaAluno.php" class="btn btn-success btn-sm" style="background-color:blue;">Voltar</a>
                </div>
                <div class="content">   
                <div class="form-group col-12 col-lg-6">
                    <form action="valida.php" method="POST">
                        <label for="curso">Cursos</label><br>
                            
                                <?php 
                                     $cursoAlunos[] = 0;
                                    while($cPro = mysqli_fetch_array($conPro)){
                                        if($cPro['ID_Aluno'] == $_GET['alunoid']){
                                            $cursoAlunos[] = $cPro['ID_Curso']; 
                                        }
                                    }
                                    while($cCursos = mysqli_fetch_array($conCursos)){
                                        $i2 = 0;
                                        for($i=0;$i<count($cursoAlunos);$i++){
                                            if($cCursos['ID_Curso'] == $cursoAlunos[$i]){
                                                $i2=1;
                                            }
                                        }
                                        if($i2 == 0){
                                            echo "<input type='checkbox' name='".$cCursos['ID_Curso']."' value='".$cCursos['ID_Curso']."'></input>".$cCursos['Nome_curso']."<br>";
                                        }      
                                    }
                                    $conthorario = 0;
                                    $consultaHorario = "SELECT * from horarios";
                                    $conH = $mysqli->query($consultaHorario) or die($mysqli->error);
                                    while($cH = mysqli_fetch_array($conH)){
                                       if($cH['Dia'] == "Segunda-Feira"){
                                           $hiSegunda [] = $cH['Hora_inicio'];
                                           $hfSegunda [] = $cH['Hora_fim'];
                                           $DispoSegunda []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idSegunda [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Terça-Feira"){
                                           $hiT [] = $cH['Hora_inicio'];
                                           $hfT [] = $cH['Hora_fim'];
                                           $DispoTerca [] =  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idT [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Quarta-Feira"){
                                           $hiQuarta [] = $cH['Hora_inicio'];
                                           $hfQuarta [] = $cH['Hora_fim'];
                                           $DispoQuarta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idQuarta [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Quinta-Feira"){
                                           $hiQuinta [] = $cH['Hora_inicio'];
                                           $hfQuinta [] = $cH['Hora_fim'];
                                           $DispoQuinta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idQuinta [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Sexta-Feira"){
                                           $hiSexta [] = $cH['Hora_inicio'];
                                           $hfSexta [] = $cH['Hora_fim'];
                                           $DispoSexta []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idSexta [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Sabádo"){
                                           $hiSabado [] = $cH['Hora_inicio'];
                                           $hfSabado [] = $cH['Hora_fim'];
                                           $DispoSabado []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idSabado [] = $cH['ID_Horario']; 
                                       }
                                       if($cH['Dia'] == "Domingo"){
                                           $hiDomingo [] = $cH['Hora_inicio'];
                                           $hfDomingo [] = $cH['Hora_fim'];
                                           $DispoDomingo []=  $cH['maquinas_dispo'] - $cH['maquinas_ocup'];
                                           $idDomingo [] = $cH['ID_Horario']; 
                                       }
                                    }
                                    
                                    echo "<h1>Horários</h1><br><p>Segunda</p>";
                                    for($i = 0 ; $i< count($hiSegunda); $i++){
                                       if($DispoSegunda[$i] == 0){
                                           echo "<input  disabled type='checkbox' value=".$idSegunda[$i]." name='horario".$conthorario."'></input>".$hiSegunda[$i]."-".$hfSegunda[$i]." - Maquinas Disponiveis:".$DispoSegunda[$i]."<br>";
                                           $conthorario++;
                                       }else{
                                           echo "<input type='checkbox' value=".$idSegunda[$i]." name='horario".$conthorario."'></input>".$hiSegunda[$i]."-".$hfSegunda[$i]." - Maquinas Disponiveis:".$DispoSegunda[$i]."<br>";
                                           $conthorario++;
                                       }
                                       }
                                       echo "<br><p>Terça</p>";
                                       for($i = 0 ; $i< count($hiT); $i++){
                                           if($DispoTerca[$i] == 0){
                                               echo "<input disabled type='checkbox' value=".$idT[$i]." name='horario".$conthorario."'></input>".$hiT[$i]."-".$hfT[$i]." - Maquinas Disponiveis:".$DispoTerca[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input  type='checkbox' value=".$idT[$i]." name='horario".$conthorario."'></input>".$hiT[$i]."-".$hfT[$i]." - Maquinas Disponiveis:".$DispoTerca[$i]."<br>";
                                               $conthorario++;
                                           }
                                          
                                       }
                                       echo "<br><p>Quarta</p>";
                                       for($i = 0 ; $i< count($hiQuarta); $i++){
                                           if($DispoQuarta[$i] == 0 ){
                                               echo "<input disabled type='checkbox' value=".$idQuarta[$i]." name='horario".$conthorario."'></input>".$hiQuarta[$i]."-".$hfQuarta[$i]." - Maquinas Disponiveis:".$DispoQuarta[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input type='checkbox' value=".$idQuarta[$i]." name='horario".$conthorario."'></input>".$hiQuarta[$i]."-".$hfQuarta[$i]." - Maquinas Disponiveis:".$DispoQuarta[$i]."<br>";
                                               $conthorario++;
                                           }             
                                       }
                                       echo "<br><p>Quinta</p>";
                                       for($i = 0 ; $i< count($hiQuinta); $i++){
                                           if($DispoQuinta[$i] == 0){
                                               echo "<input disabled type='checkbox' value=".$idQuinta[$i]." name='horario".$conthorario."'></input>".$hiQuinta[$i]."-".$hfQuinta[$i]." - Maquinas Disponiveis:".$DispoQuinta[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input type='checkbox' value=".$idQuinta[$i]." name='horario".$conthorario."'></input>".$hiQuinta[$i]."-".$hfQuinta[$i]." - Maquinas Disponiveis:".$DispoQuinta[$i]."<br>";
                                               $conthorario++;
                                           } 
                                       }
                                       echo "<br><p>Sexta</p>";
                                       for($i = 0 ; $i< count($hiSexta); $i++){
                                           if($DispoSexta[$i] == 0){
                                               echo "<input disabled type='checkbox' value=".$idSexta[$i]." name='horario".$conthorario."'></input>".$hiSexta[$i]."-".$hfSexta[$i]." - Maquinas Disponiveis:".$DispoSexta[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input type='checkbox' value=".$idSexta[$i]." name='horario".$conthorario."'></input>".$hiSexta[$i]."-".$hfSexta[$i]." - Maquinas Disponiveis:".$DispoSexta[$i]."<br>";
                                               $conthorario++;
                                           } 
                                       }
                                       echo "<br><p>Sabádo</p>";
                                       for($i = 0 ; $i< count($hiSabado); $i++){
                                           if($DispoSabado[$i] == 0){
                                               echo "<input disabled type='checkbox' value=".$idSabado[$i]." name='horario".$conthorario."'></input>".$hiSabado[$i]."-".$hfSabado[$i]." - Maquinas Disponiveis:".$DispoSabado[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input type='checkbox' value=".$idSabado[$i]." name='horario".$conthorario."'></input>".$hiSabado[$i]."-".$hfSabado[$i]." - Maquinas Disponiveis:".$DispoSabado[$i]."<br>";
                                               $conthorario++;
                                           }
                                       }
                                       echo "<br><p>Domingo</p>";
                                       for($i = 0 ; $i< count($hiDomingo); $i++){
                                           if($DispoDomingo[$i] == 0){
                                               echo "<input disabled type='checkbox' value=".$idDomingo[$i]." name='horario".$conthorario."'></input>".$hiDomingo[$i]."-".$hfDomingo[$i]." - Maquinas Disponiveis:".$DispoDomingo[$i]."<br>";
                                               $conthorario++;
                                           }else{
                                               echo "<input type='checkbox' value=".$idDomingo[$i]." name='horario".$conthorario."'></input>".$hiDomingo[$i]."-".$hfDomingo[$i]." - Maquinas Disponiveis:".$DispoDomingo[$i]."<br>";
                                               $conthorario++;
                                           }
                                          
                                       }
                                       echo "<input type='number' value='".$conthorario."' name='conthorario' style='display:none'></input>";
                                   ?>
     
                            <?php
                            echo "<input class='btn btn-success mr-2' type='submit' value='Enviar' name='alunoCurso'>
                                <input style='display:none' value ='".$_GET['nome']."' name='nome'/>
                                <input style='display:none' value ='".$_GET['alunoid']."' name='alunoid'/>";
                            ?>
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