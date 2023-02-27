<?php 
    include("valida.php");
    $consultaAlunos = "SELECT * from alunos";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
    $conCursos = $mysqli->query($consultaCursos) or die($mysqli->error);
    session_start();
	if($_SESSION['verifica'] != 2){
        header('Location: ./index.html');
    }
    if($_SESSION['Perfil'] == "Afiliado"){
        $consultaAfiliadoAluno = "SELECT * from cursos_afiliados WHERE ID_afiliados = '{$_SESSION['id']}'";
        $conAA = $mysqli->query($consultaAfiliadoAluno) or die($mysqli->error);
    }
    if($_SESSION['Perfil'] == "Franqueado"){
        $consultaFranqueadoAluno = "SELECT * from cursos_franqueados  WHERE ID_franqueador = '{$_SESSION['id']}'";
        $conFA = $mysqli->query($consultaFranqueadoAluno) or die($mysqli->error);
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
<h1 style="text-align:center;">Aniversariantes</h1>
<p style="margin-left:5px;font-size:16px;">Consultar aniversariantes de: </p>
<form style="margin-left:5px; margin-botton:5px;" method="post" action="aniversariantes.php">
<h5>Mês: </h5>
<select name="mes">
    <option value="01">Janeiro</option>
    <option value="02">Fevereiro</option>
    <option value="03">Março</option>
    <option value="04">Abril</option>
    <option value="05">Maio</option>
    <option value="06">Junho</option>
    <option value="07">Julho</option>
    <option value="08">Agosto</option>
    <option value="09">Setembro</option>
    <option value="10">Outubro</option>
    <option value="11">Novembro</option>
    <option value="12">Dezembro</option>
</select>
<br><br>
<input type="submit" value="Buscar" id="submit" class="btn btn-success btn-sm" style="font-size:16px;">
<a href="./admin.php" class="btn btn-success btn-sm" style="background-color:blue;font-size:16px;">Voltar</a>
<br><br>
</form>


<?php
$datames = @$_POST['mes'];
$table = '<table class="table table-striped" id="tableAluno">';
    $table .='<thead>';
        $table .= '<tr>';
            $table .= '<th>ID</th>';
            $table .= '<th>Nome</th>';
            $table .= '<th>Nascimento</th>';
            $table .= '<th>Telefone</th>';
            $table .= '<th>Email</th>';
        $table .= '<tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

        while($cAlunos = mysqli_fetch_array($conAlunos)){

            $nascimentom = substr($cAlunos['Nascimento'], 5,2);
            
            // nomes dos aniversariantes do mês
             
                if($nascimentom==$datames){
                    if($_SESSION['Perfil'] == "Franqueado"){
                        while($c = mysqli_fetch_array($conFA)){
                            if($c['ID_Aluno'] == $cAlunos['ID_Aluno']){
                                $table .= "<tr>";
                                $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                                $table .= "<td>{$cAlunos['Nome']}</td>";
                                $cAlunos['Nascimento']=date('d/m/Y', strtotime($cAlunos['Nascimento']));
                                $table .= "<td>{$cAlunos['Nascimento']}</td>";
                                $table .= "<td>{$cAlunos['Telefone']}</td>";
                                $table .= "<td>{$cAlunos['Email']}</td>";
                                $table .= "</tr>";
                            }
                        }
                        
                    }
                    if($_SESSION['Perfil'] == "Afiliado"){
                        while($c = mysqli_fetch_array($conAA)){
                            if($c['ID_Aluno'] == $cAlunos['ID_Aluno']){
                                $table .= "<tr>";
                                $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                                $table .= "<td>{$cAlunos['Nome']}</td>";
                                $cAlunos['Nascimento']=date('d/m/Y', strtotime($cAlunos['Nascimento']));
                                $table .= "<td>{$cAlunos['Nascimento']}</td>";
                                $table .= "<td>{$cAlunos['Telefone']}</td>";
                                $table .= "<td>{$cAlunos['Email']}</td>";
                                $table .= "</tr>";
                            }
                        }
                        
                    }
                    if($_SESSION['Perfil'] == "Administrador" || $_SESSION['Perfil'] == "Coordenador" || $_SESSION['Perfil'] == "Instrutor"){
                        $colabFranqueado = "SELECT * from cursos_franqueados  WHERE ID_franqueador = '{$_SESSION['idfran']}'";
                        $cFranqueado = $mysqli->query($colabFranqueado) or die($mysqli->error);
                        $idColabFranqueado = [];
                        while($c = mysqli_fetch_array($cFranqueado)){
                            $idColabFranqueado[] = $c['ID_Aluno'];
                        }
                        for($i=0;$i<count($idColabFranqueado);$i++){
                            if($idColabFranqueado[$i] == $cAlunos['ID_Aluno'])
                            {
                                $table .= "<tr>";
                                $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                                $table .= "<td>{$cAlunos['Nome']}</td>";
                                $cAlunos['Nascimento']=date('d/m/Y', strtotime($cAlunos['Nascimento']));
                                $table .= "<td>{$cAlunos['Nascimento']}</td>";
                                $table .= "<td>{$cAlunos['Telefone']}</td>";
                                $table .= "<td>{$cAlunos['Email']}</td>";
                                $table .= "</tr>";
                            }
                        }
                       
                    }
                   
                }
                
            

        }
    $table .= '</tbody>';
$table .= '</table>';
echo $table;

?>
</html>