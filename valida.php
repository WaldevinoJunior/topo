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
$consulta4 = "SELECT * FROM aluno_testes";
$con = $mysqli->query($consulta) or die($mysqli->error);
$con2 = $mysqli->query($consulta2) or die($mysqli->error);
$con3 = $mysqli->query($consulta3) or die($mysqli->error);
$con4 = $mysqli->query($consulta4) or die($mysqli->error);
if($mysqli->connect_errno){
    echo "falha na conexao: (".$mysqli->connect_errno.") " .$mysqli->connect_error;
}
if(isset($_POST['submitindex'])){
	session_start();
	$_SESSION['verifica'] = 0;
	while($c = mysqli_fetch_array($con)){	
		if(isset($_POST['Login']) && isset($_POST['Senha'])){
			if($_POST['Login'] == $c['Login'] && $_POST['Senha'] == $c['Senha']){
				$_SESSION['nome'] = $c['Nome'];
				$_SESSION['ID_Aluno'] = $c['ID_Aluno'];
				header('Location: ./usuario.php');
				$_SESSION['verifica'] = 1;
			}
		}
	}
	while($c3 = mysqli_fetch_array($con3)){	
		if(isset($_POST['Login']) && isset($_POST['Senha'])){
			if($_POST['Login'] == $c3['Login'] && $_POST['Senha'] == $c3['Senha']){
				$_SESSION['Perfil'] = $c3['Perfil'];
				header('Location: ./admin.php');
				$_SESSION['verifica'] = 2;	
			}
		}
	}
	if($_SESSION['verifica'] == 0){
		header('Location: ./index.html');
	}
}

if(isset($_POST['sair'])){
	session_start();
	$_SESSION['verifica'] = 0;
	header('Location:index.html');
}
if(isset($_GET['sair'])){
	session_start();
	$_SESSION['verifica'] = 0;
	header('Location:index.html');
}
// else{
// 	echo $resultado;
// 	header('location: ./services.html');
//     exit;
// }
while($c3 = mysqli_fetch_array($con3)){
	if(isset($_POST['Login']) && isset($_POST['Senha'])){
		if($_POST['Login'] == $c3['Login'] && $_POST['Senha'] == $c3['Senha']){
			session_start();
			$_SESSION['nome'] = $c3['Nome'];
			$_SESSION['ID_Colaborador'] = $c3['ID_Colaborador'];
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
	$inse = 0;
	if(!isset($_SESSION)){session_start();}
	while($c4 = mysqli_fetch_array($con4)){
		if($_POST['aula'] == $c4['Numero_aula'] && $_POST['idcurso'] == $c4['ID_Curso'] && $_SESSION['ID_Aluno'] == $c4['ID_Aluno'] && $c4['Nota'] < $_COOKIE['total']){
			$sqlteste = "UPDATE aluno_testes SET Nota = '{$_COOKIE['total']}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND Numero_Aula = '{$_POST['aula']}' AND ID_Curso = '{$_POST['idcurso']}'";
			$sqltestebd = $mysqli->query($sqlteste) or die($mysqli->error);
			$sqlprogresso = "UPDATE aluno_curso_progressos SET Estagio = '2' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
			$sqlpro= $mysqli->query($sqlprogresso) or die($mysqli->error);
			//$arquiv = "SELECT imagem FROM alunos WHERE ID_ALUNO = '{$_SESSION['ID_Aluno']}'";
			if($_COOKIE['total'] > 70){
				$atual = $_POST['aula'] + 1;
				$sqlprogresso2 = "UPDATE aluno_curso_progressos SET Estagio = '1', Aula_atual = '{$atual}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
				$sqlpro2= $mysqli->query($sqlprogresso2) or die($mysqli->error);
				$atual = "SELECT Aula_atual FROM aluno_curso_progressos WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
				$sqlatual = $mysqli->query($atual) or die($mysqli->error);
				$atual2 = mysqli_fetch_array($sqlatual)[0];
				$consul = "SELECT cursos.aulas_totais from cursos join aluno_curso_progressos ON aluno_curso_progressos.ID_Curso = cursos.ID_Curso join alunos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno WHERE alunos.ID_Aluno = '{$_SESSION['ID_Aluno']}' and cursos.ID_Curso = '{$_POST['idcurso']}'";
            	$cons= $mysqli->query($consul) or die($mysqli->error);
            	$aulas2 = mysqli_fetch_array($cons)[0];
				if($atual2 == $aulas2){
					$aula = $_POST['aula'];
					$sqlprogresso2 = "UPDATE aluno_curso_progressos SET Estagio = '3', Aula_atual = '{$aula}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
					$sqlpro2= $mysqli->query($sqlprogresso2) or die($mysqli->error);
				}
			}
			$inse++;
		}
		if($_POST['aula'] == $c4['Numero_aula'] && $_POST['idcurso'] == $c4['ID_Curso'] && $_SESSION['ID_Aluno'] == $c4['ID_Aluno'] && $c4['Nota'] > $_COOKIE['total']){
			$inse++;
		}
		if($_POST['aula'] == $c4['Numero_aula'] && $_POST['idcurso'] == $c4['ID_Curso'] && $_SESSION['ID_Aluno'] == $c4['ID_Aluno'] && $c4['Nota'] == $_COOKIE['total']){
			$inse++;
		}
	}
	if($inse == 0){
		$sqlprogresso = "UPDATE aluno_curso_progressos SET Estagio = '2' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
		$sqlpro= $mysqli->query($sqlprogresso) or die($mysqli->error);
		$sqlteste2 = "INSERT INTO aluno_testes (ID_Aluno, ID_Curso, Numero_Aula, Nota) VALUES  ('{$_SESSION['ID_Aluno']}', '{$_POST['idcurso']}', '{$_POST['aula']}', '{$_COOKIE['total']}')";
		$sqltestebd = $mysqli->query($sqlteste2) or die($mysqli->error);
		if($_COOKIE['total'] > 70){
			$sqlprogresso = "UPDATE aluno_curso_progressos SET Estagio = '1' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
			$sqlpro= $mysqli->query($sqlprogresso) or die($mysqli->error);
			$atual = "SELECT Aula_atual FROM aluno_curso_progressos WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
			$sqlatual = $mysqli->query($atual) or die($mysqli->error);
			$atual2 = mysqli_fetch_array($sqlatual)[0];
			$consul = "SELECT cursos.aulas_totais from cursos join aluno_curso_progressos ON aluno_curso_progressos.ID_Curso = cursos.ID_Curso join alunos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno WHERE alunos.ID_Aluno = '{$_SESSION['ID_Aluno']}' and cursos.ID_Curso = '{$_POST['idcurso']}'";
            $cons= $mysqli->query($consul) or die($mysqli->error);
            $aulas2 = mysqli_fetch_array($cons)[0];
			if($_POST['aula'] <= $atual2){
				if($atual2 < $aulas2){
					$aula = $_POST['aula'] + 1;
					$sqlprogresso2 = "UPDATE aluno_curso_progressos SET Estagio = '1', Aula_atual = '{$aula}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
					$sqlpro2= $mysqli->query($sqlprogresso2) or die($mysqli->error);
				}
				if($atual2 == $aulas2){
					$aula = $_POST['aula'];
					$sqlprogresso2 = "UPDATE aluno_curso_progressos SET Estagio = '3', Aula_atual = '{$aula}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
					$sqlpro2= $mysqli->query($sqlprogresso2) or die($mysqli->error);
					/*$sqlprogresso3 = "UPDATE alunos SET Status = '2' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}'";
					$sqlpro3= $mysqli->query($sqlprogresso3) or die($mysqli->error);*/
					$mediaCon = "SELECT Nota from aluno_testes WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}' AND ID_Curso = '{$_POST['idcurso']}'";
					$mediaC= $mysqli->query($mediaCon) or die($mysqli->error);
					while($mC = mysqli_fetch_array($mediaC)){
						$media += $mC['Nota'];
					}
					$media = $media/$aulas2;
					$datafim = date('Y-m-d');
					$codigo = uniqid();
					$sqlprogresso3 = "INSERT INTO historicos (id_aluno, id_curso, media, data_fim, codigo) VALUES ('{$_SESSION['ID_Aluno']}', '{$_POST['idcurso']}', '{$media}', '{$datafim}', '{$codigo}')";
					$sqlpro3= $mysqli->query($sqlprogresso3) or die($mysqli->error);
				}
			}
		}
		
		header('Location: ./usuario.php');
	}
	else{
		header('Location: ./usuario.php');
	}
	
}
if(isset($_POST['enviareditarAluno'])){
	$consulta = "UPDATE alunos SET Nome = '{$_POST['nome']}',Responsavel_2 = '{$_POST['resp']}',Responsavel_numero = '{$_POST['respT']}', Nascimento = '{$_POST['nascimento']}', 
	Email = '{$_POST['email']}',Telefone = '{$_POST['telefone']}', CPF = '{$_POST['cpf']}', 
	RG = '{$_POST['rg']}', CEP = '{$_POST['cep']}', Estado = '{$_POST['estado']}', Cidade = '{$_POST['cidade']}', Rua = '{$_POST['rua']}'
	, Numero = '{$_POST['numero']}', Complemento = '{$_POST['complemento']}'
	, Senha = '{$_POST['senha']}', Login = '{$_POST['login']}', Status = '{$_POST['status']}'  WHERE ID_Aluno = '{$_POST['id']}'";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	header('Location: ./admin.php');
}
if(isset($_POST['cadastraAluno'])){
	$consulta = "INSERT INTO alunos (Nome, Nascimento, Email, Telefone, CPF, RG, CEP, Estado, Cidade, Rua, Numero, Complemento, Senha, imagem) VALUES  ('{$_POST['nome']}', '{$_POST['nascimento']}', 
	'{$_POST['email']}','{$_POST['telefone']}','{$_POST['cpf']}', '{$_POST['rg']}', 
	'{$_POST['cep']}', '{$_POST['estado']}', '{$_POST['cidade']}','{$_POST['rua']}'
	, '{$_POST['numero']}', '{$_POST['complemento']}', '{$_POST['senha']}' , 'oi')";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	$consultaCpf = "SELECT ID_Aluno from alunos WHERE CPF = '{$_POST['cpf']}'";
	$sqlcpf = $mysqli->query($consultaCpf) or die($mysqli->error);
	$idAluno = mysqli_fetch_array($sqlcpf)[0];
	$dataatual = date('y/m/d');
	$cursopro = "INSERT INTO aluno_curso_progressos (ID_Curso, ID_Aluno, Aula_atual, Estagio, data_inicio) VALUES ('{$_POST['curso']}','{$idAluno}', '1' , '1', '{$dataatual}')";
	$sqlpro = $mysqli->query($cursopro) or die($mysqli->error);
	header('Location: ./admin.php');
}
if(isset($_POST['enviareditarColab'])){
	$consulta = "UPDATE colaboradores SET Nome = '{$_POST['nome']}', Nascimento = '{$_POST['nascimento']}',Email = '{$_POST['email']}',
	Telefone = '{$_POST['telefone']}', CPF = '{$_POST['cpf']}', 
	CEP = '{$_POST['cep']}', Estado = '{$_POST['estado']}', Cidade = '{$_POST['cidade']}', Rua = '{$_POST['rua']}'
	, Numero = '{$_POST['numero']}', Complemento = '{$_POST['complemento']}'
	, Login = '{$_POST['login']}',Senha = '{$_POST['senha']}'  WHERE ID_Colaborador = '{$_POST['id']}'";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	header('Location: ./admin.php');
}
if(isset($_POST['cadastraColab'])){
	$consulta = "INSERT INTO colaboradores (Nome, Nascimento, Email, Telefone, CPF, CEP, Estado, Cidade, Rua, Numero, Complemento,Login, Senha, Perfil) VALUES  ('{$_POST['nome']}', '{$_POST['nascimento']}', 
	'{$_POST['email']}','{$_POST['telefone']}','{$_POST['cpf']}', 
	'{$_POST['cep']}', '{$_POST['estado']}', '{$_POST['cidade']}','{$_POST['rua']}'
	, '{$_POST['numero']}', '{$_POST['complemento']}', '{$_POST['login']}','{$_POST['senha']}', '{$_POST['perfil']}')";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	header('Location: ./admin.php');
}
if(isset($_POST['cadastraAluno2'])){
	$consulta = "INSERT INTO alunos (Nome,Responsavel_2, Responsavel_numero, Nascimento, Email, Telefone, CPF, RG, CEP, Estado, Cidade, Rua, Numero, Complemento, Senha, Login, Status,  imagem) VALUES  ('{$_POST['nome']}','{$_POST['resp']}','{$_POST['respT']}', '{$_POST['nascimento']}', 
	'{$_POST['email']}','{$_POST['telefone']}','{$_POST['cpf']}', '{$_POST['rg']}', 
	'{$_POST['cep']}', '{$_POST['estado']}', '{$_POST['cidade']}','{$_POST['rua']}'
	, '{$_POST['numero']}', '{$_POST['complemento']}', '{$_POST['senha']}' ,'{$_POST['login']}','1', 'oi')";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	$consultaCpf = "SELECT ID_Aluno from alunos WHERE CPF = '{$_POST['cpf']}'";
	$sqlcpf = $mysqli->query($consultaCpf) or die($mysqli->error);
	$idAluno = mysqli_fetch_array($sqlcpf)[0];
	$dataatual = date('y/m/d');
	$cursoQuant = "SELECT ID_Curso From cursos";
	$sqlc = $mysqli->query($cursoQuant) or die($mysqli->error);
	while($cQ = mysqli_fetch_array($sqlc)){
		if(isset($_POST[$cQ['ID_Curso']])){
			$cursopro = "INSERT INTO aluno_curso_progressos (ID_Curso, ID_Aluno, Aula_atual, Estagio, data_inicio) VALUES ('{$cQ['ID_Curso']}','{$idAluno}', '1' , '1', '{$dataatual}')";
			$sqlpro = $mysqli->query($cursopro) or die($mysqli->error);
		}
	}
	for($i = 0;$i<$_POST['conthorario'];$i++){
		if(isset($_POST['horario'.$i.''])){
				$consulta = "INSERT INTO horarios_alunos (ID_Aluno, ID_Horario) VALUES  ('{$idAluno}', '{$_POST['horario'.$i.'']}')";
				$sqlhorario = $mysqli->query($consulta) or die($mysqli->error);
				$consultaM = "SELECT maquinas_ocup FROM horarios WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sqlM = $mysqli->query($consultaM) or die($mysqli->error);
				$mocup = mysqli_fetch_array($sqlM)[0] + 1;
				$consulta2 = "UPDATE horarios SET  maquinas_ocup = '{$mocup}' WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sql2 = $mysqli->query($consulta2) or die($mysqli->error);
		}
	}
	header('Location: ./cadastraAluno.php');
}
if(isset($_POST['alunoCurso'])){
	$dataatual = date('y/m/d');
	$id = $_POST['alunoid'];
	$nome = $_POST['nome'];
	$dataatual = date('y/m/d');
	$cursoQuant = "SELECT ID_Curso From cursos";
	$sqlc = $mysqli->query($cursoQuant) or die($mysqli->error);
	while($cQ = mysqli_fetch_array($sqlc)){
		if(isset($_POST[$cQ['ID_Curso']])){
			$cursopro = "INSERT INTO aluno_curso_progressos (ID_Curso, ID_Aluno, Aula_atual, Estagio, data_inicio) VALUES ('{$cQ['ID_Curso']}','{$id}', '1' , '1', '{$dataatual}')";
			$sqlpro = $mysqli->query($cursopro) or die($mysqli->error);
		}
	}
	for($i = 0;$i<$_POST['conthorario'];$i++){
		if(isset($_POST['horario'.$i.''])){
			$i2 = 0;
			$consultah = "SELECT * FROM horarios_alunos";
			$sqlh = $mysqli->query($consultah) or die($mysqli->error);
			while($ch = mysqli_fetch_array($sqlh)){
				if($ch['ID_Aluno'] == $id && $ch['ID_Horario'] == $_POST['horario'.$i.'']){
					$i2 = 1;
				}
			}
			if($i2 == 0){
				$consulta = "INSERT INTO horarios_alunos (ID_Aluno, ID_Horario) VALUES  ('$id', '{$_POST['horario'.$i.'']}')";
				$sqlhorario = $mysqli->query($consulta) or die($mysqli->error);
				$consultaM = "SELECT maquinas_ocup FROM horarios WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sqlM = $mysqli->query($consultaM) or die($mysqli->error);
				$mocup = mysqli_fetch_array($sqlM)[0] + 1;
				$consulta2 = "UPDATE horarios SET  maquinas_ocup = '{$mocup}' WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sql2 = $mysqli->query($consulta2) or die($mysqli->error);
			}
		}
	header('Location: ./cursoAluno.php?alunoid='.$id.'&&nome='.$nome.'');
}
}
if(isset($_POST['cadastraCurso'])){
	$consulta = "INSERT INTO cursos (Nome_curso, Preco, Horas, Descricao, aulas_totais) VALUES  ('{$_POST['nome']}', '{$_POST['preco']}', 
	'{$_POST['horas']}','{$_POST['descricao']}','{$_POST['aulas']}')";
	$sqledita = $mysqli->query($consulta) or die($mysqli->error);
	header('Location: ./curso.php');
}
if(isset($_POST['buscaAluno'])){
	header('Location: ./buscarAluno.php?alunoid='.$_POST['aluno'].'');
}
if(isset($_POST['cadastraHorario'])){
	$consulta = "INSERT INTO horarios (Dia, Hora_inicio, Hora_fim, maquinas_dispo, maquinas_ocup) VALUES  ('{$_POST['dia']}', '{$_POST['datainicio']}', 
	'{$_POST['datafim']}','{$_POST['maquinas']}','0')";
	$sqlhorario = $mysqli->query($consulta) or die($mysqli->error);
	header('Location: ./horario.php');
}
if(isset($_POST['cadastraAlunoHorario'])){
	for($i = 0;$i<$_POST['conthorario'];$i++){
		if(isset($_POST['horario'.$i.''])){
			$i2 = 0;
			$consultah = "SELECT * FROM horarios_alunos";
			$sqlh = $mysqli->query($consultah) or die($mysqli->error);
			while($ch = mysqli_fetch_array($sqlh)){
				if($ch['ID_Aluno'] == $_POST['aluno'] && $ch['ID_Horario'] == $_POST['horario'.$i.'']){
					$i2 = 1;
				}
			}
			if($i2 == 0){
				$consulta = "INSERT INTO horarios_alunos (ID_Aluno, ID_Horario) VALUES  ('{$_POST['aluno']}', '{$_POST['horario'.$i.'']}')";
				$sqlhorario = $mysqli->query($consulta) or die($mysqli->error);
				$consultaM = "SELECT maquinas_ocup FROM horarios WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sqlM = $mysqli->query($consultaM) or die($mysqli->error);
				$mocup = mysqli_fetch_array($sqlM)[0] + 1;
				$consulta2 = "UPDATE horarios SET  maquinas_ocup = '{$mocup}' WHERE ID_Horario = '{$_POST['horario'.$i.'']}'";
				$sql2 = $mysqli->query($consulta2) or die($mysqli->error);
			}
		}
	}
	header('Location: ./alunoHorario.php');
	/*foreach($_POST['horario'] as $horario){
		$consulta = "INSERT INTO horarios_alunos (ID_Aluno, ID_Horario) VALUES  ('{$_POST['aluno']}', '{$horario}')";
		$sqlhorario = $mysqli->query($consulta) or die($mysqli->error);
	}
	//header('Location: ./alunoHorario.php');*/
}
if(isset($_POST['presenca'])){
	for($i=0;$i<$_POST['cont'];$i++){
		$i2 = "aluno".$i;
		if(isset($_POST[$i2])){
			$confirma = 0;
			$data = date('Y-m-d');
			$consultaPre = "SELECT * FROM alunos_presenca";
			$sqlPre = $mysqli->query($consultaPre) or die($mysqli->error);
			while($cPre = mysqli_fetch_array($sqlPre)){
				if($cPre['ID_Aluno'] == $_POST[$i2] && $cPre['ID_Horario'] == $_POST['idhorario'] && $cPre['Data'] == $data){
					$confirma  = 1;
				}
			}
			if($confirma == 0){
				$consulta = "INSERT INTO alunos_presenca(ID_Aluno, ID_Horario, Data, Presenca) VALUES ('{$_POST[$i2]}', '{$_POST['idhorario']}', '{$data}', '1')";
				$sql = $mysqli->query($consulta) or die($mysqli->error);
			}
		}
	}
	header('Location: ./listaPresenca.php');
}
if(isset($_GET['back'])){
	$output = shell_exec('C:\xampp2\mysql\bin\mysqldump -u root podium > backup.sql');
	header('Location: ./admin.php');
}
if(isset($_POST['deletarCursoHorario'])){
	$consultaHA = "SELECT ID_Horario FROM horarios_alunos WHERE ID_Aluno = '{$_POST['alunoid']}'";
	$conHA = $mysqli->query($consultaHA) or die($mysqli->error);
	while($c = mysqli_fetch_array($conHA)){
		for($i=0;$i<$_POST['tHorario'];$i++){
			if(isset($_POST['horario'.$i.''])){
				if($c['ID_Horario'] == $_POST['horario'.$i.'']){
					$delete = "DELETE FROM horarios_alunos WHERE ID_Horario = '{$c['ID_Horario']}' AND ID_Aluno = '{$_POST['alunoid']}'";
					$sqldelete = $mysqli->query($delete) or die($mysqli->error);
					$maquina = "SELECT maquinas_ocup FROM horarios WHERE ID_Horario = '{$c['ID_Horario']}'";
					$m = $mysqli->query($maquina) or die($mysqli->error);
					$mocup = mysqli_fetch_array($m)[0];
					$mocup = $mocup - 1;
					$maquina2 = "UPDATE horarios SET maquinas_ocup = '{$mocup}' WHERE  ID_Horario = '{$c['ID_Horario']}'";
					$m2 = $mysqli->query($maquina2) or die($mysqli->error);
				}
			}
		}
	}
	$consultaC = "SELECT ID_Curso FROM aluno_curso_progressos WHERE ID_Aluno =  '{$_POST['alunoid']}'";
	$conC = $mysqli->query($consultaC) or die($mysqli->error);
	while($c = mysqli_fetch_array($conC)){
		for($i = 0;$i<$_POST['tCurso'];$i++){
			if(isset($_POST['curso'.$i.''])){
				if($c['ID_Curso'] == $_POST['curso'.$i.'']){
					$delete = "DELETE FROM aluno_curso_progressos WHERE ID_Aluno =  '{$_POST['alunoid']}' AND ID_Curso = '{$c['ID_Curso']}'";
					$sqldelete = $mysqli->query($delete) or die($mysqli->error);
				}
			}
		}
	}
	header('Location: ./listaAluno.php');
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
