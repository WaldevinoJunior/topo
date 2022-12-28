<?php
//FAZ A CONEXAO COM O BANCO DE DADOS PODIUM
$host = "localhost";
$user = "root";
$pass = "";
$db = "podium";
$mysqli = new mysqli($host, $user, $pass, $db);
//SELECIONA AS TABELAS ALUNOS E CURSOS
$consulta = "SELECT * FROM alunos";
$consulta2 = "SELECT * FROM cursos";
$consulta3 = "SELECT * FROM colaboradores";
$con = $mysqli->query($consulta) or die($mysqli->error);
$con2 = $mysqli->query($consulta2) or die($mysqli->error);
$con3 = $mysqli->query($consulta3) or die($mysqli->error);
if($mysqli->connect_errno){
    echo "falha na conexao: (".$mysqli->connect_errno.") " .$mysqli->connect_error;
}
while($c = mysqli_fetch_array($con)){
	if(isset($_POST['ID_Aluno']) && isset($_POST['Senha'])){
		if($_POST['ID_Aluno'] == $c['ID_Aluno'] && $_POST['Senha'] == $c['Senha']){
			session_start();
			$_SESSION['nome'] = $c['Nome'];
			$_SESSION['ID_Aluno'] = $_POST['ID_Aluno'];
			$resultado = 1;
			break;
		}
	}
}

// else{
// 	echo $resultado;
// 	header('location: ./services.html');
//     exit;
// }
while($c3 = mysqli_fetch_array($con3)){
	if(isset($_POST['ID_Aluno']) && isset($_POST['Senha'])){
		if($_POST['ID_Aluno'] == $c3['Login'] && $_POST['Senha'] == $c3['Senha']){
			session_start();
			$_SESSION['nome'] = $c3['Nome'];
			$_SESSION['ID_Colaborador'] = $_POST['ID_Aluno'];
			header('Location: ./admin.php');
		}	
	}
}
 

if(isset($_POST['Enviar'])){
	$email = $mysqli->escape_string($_POST['email']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error[] = "Email errado";
		echo $error;
	}
	if(count($error) == 0){
	$novasenha = substr(md5(time()) ,0,6);
	$novasenhacrip = md5(md5($novasenha));
	if( mail($email, "Sua Nova Senha", "Sua Nova senha é:" .$novasenha)){
		$sql_code = "UPDATE alunos SET Senha = '$novasenhacrip' WHERE Email = '$email' ";
		$sql_query = $mysqli->query($sqli_code) or die($mysqli->error);
		}
	}
}
if(isset($_POST['enviarteste'])){
	echo $_POST['aula'];
	echo $_POST['idcurso'];
	echo $_COOKIE['total'];
	
}
/*if($contador!=1){
	header('Location: /topo/login.html');
}
else{
}*/
/*<?php
            if(!isset($_SESSION)){session_start();}
            $exibir = "SELECT imagem FROM alunos WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}'";
            $resultado2 = $mysqli->query($exibir) or die($mysqli->error);
            $row = mysqli_fetch_array($resultado2);
            echo "<img src='data:image;base64, ".base64_encode($row['imagem'])."'>";
        ?>>*/
?>
