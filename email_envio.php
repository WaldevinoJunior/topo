<?php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $id_Curso = $_POST['id_Curso'];
  $total = $_POST['total'];
  $nome_curso = $_POST['nome_curso'];

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

   $arquivo = "
    <html>
    <p><b>$nome</b> comprou <b>$nome_curso</b>, realizou o pagamento de R$<b>$total</b> e respondeu ao formulário com os seguintes dados:</p>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Telefone: </b>$tel</p>
      <p><b>Login: </b>$login</p>
      <p><b>Senha: </b>$senha</p>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  $destino = "beatriz.trindade.work@gmail.com";
  $assunto = "Pagamento via Pix";

  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  
  mail($destino, $assunto, $arquivo, $headers);
  
  echo '<script>alert("Informações enviadas com sucesso! Aguarde nosso contato.")</script>';
  echo "<meta http-equiv='refresh' content='0;URL=./services.php'>";

?>
