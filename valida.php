<?php
/* $host = "localhost";
$db   = "podium";
$user = "root";
$pass = "";
$con = mysql_pconnect($host, $user, $pass);
mysql_select_db($db, $con);
$query = sprintf("SELECT nome FROM alunos");
$dados = mysql_query($query, $con) or die(mysql_error());
$linha = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);
?>
<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>
			<p><?=$linha['nome']?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysql_fetch_assoc($dados));
	// fim do if
	}
?>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?> */
$host = "localhost";
$user = "root";
$pass = "";
$db = "podium";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno){
    echo "falha na conexao: (".$mysqli->connect_errno.") " .$mysqli->connect_error;
}

?>
