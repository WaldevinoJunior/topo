<?php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $whats = $_POST['whats'];
  $motivo = $_POST['assunto'];
  //$mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //echo "<br> nome: ".$nome."";
  //echo "<br> email: ".$email."";
  //echo "<br> tel: ".$tel."";
  //echo "<br> login: ".$login."";
  //echo "<br> senha: ".$senha."";
  //echo "<br> idcurso: ".$id_Curso."";
  //echo "<br> Valor: R$".$total."";
  //echo "<br> Curso: ".$nome_curso."";
  $arquivo = "$nome enviou-lhe uma mensagem com o objetivo de contatar:
    Nome: $nome
    E-mail: $email
    Telefone: $whats
    Motivo do contato: $motivo
    Este e-mail foi enviado em $data_envio às $hora_envio
";
  
  $destino = "contato@topotreinamentos.com.br";
  $assunto = "Contatou pelo Site da Topo Treinamentos";

  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  
  mail($destino, $assunto, $arquivo, $headers);
  
  echo '<script>alert("Informações enviadas com sucesso! Aguarde nosso contato.")</script>';
  echo "<meta http-equiv='refresh' content='0;URL=./services.php'>";

?>