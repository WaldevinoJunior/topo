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
<p style="margin-left:5px;">Consultar aniversariantes do: </p>
<form style="margin-left:5px; margin-botton:5px;" method="post" action="aniversariantes.php">
<input type="radio" name="aniver" value="1" id="dia"> Dia
<input type="radio" name="aniver" value="2" id="mes"> Mês
<br><br>
<input type="submit" value="Buscar" class="btn btn-success btn-sm">
<br><br>
</form>



<?php
$escolha = @$_POST['aniver'];
$datahoje = date('m-d');
$datames = date('m');
$table = '<table class="table table-striped" id="tableAluno">';
    $table .='<thead>';
        $table .= '<tr>';
            $table .= '<th>ID</th>';
            $table .= '<th>Nome</th>';
            $table .= '<th>Nascimento</th>';
        $table .= '<tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

        while($cAlunos = mysqli_fetch_array($conAlunos)){
            $nascimentodm = substr($cAlunos['Nascimento'], -5);
            $nascimentom = substr($cAlunos['Nascimento'], 5,2);
            if($escolha==1){
                // nomes dos aniversariantes do dia
                if($nascimentodm==$datahoje){
                    $table .= "<tr>";
                    $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                    $table .= "<td>{$cAlunos['Nome']}</td>";
                    $table .= "<td>{$cAlunos['Nascimento']}</td>";
                    $table .= "</tr>";
                }
            }
            
            // nomes dos aniversariantes do mês
             else if($escolha==2){
                if($nascimentom==$datames){
                    $table .= "<tr>";
                    $table .= "<td>{$cAlunos['ID_Aluno']}</td>";
                    $table .= "<td>{$cAlunos['Nome']}</td>";
                    $table .= "<td>{$cAlunos['Nascimento']}</td>";
                    $table .= "</tr>";
                }
                
            }

        }
    $table .= '</tbody>';
$table .= '</table>';
echo $table;



?>
</html>