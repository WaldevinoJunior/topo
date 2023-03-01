<?php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $id_Curso = $_POST['id_Curso'];
  $total = $_POST['total'];
  $nome_curso = $_POST['nome_curso'];
  
if(isset($_POST['cupom']))
{
    $cupom = $_POST['cupom'];
}
if(isset($_POST['afiliado']))
{
    $afiliado = $_POST['afiliado'];
}
 

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

if((isset($cupom))&&(isset($afiliado))){

   $arquivo = " $nome comprou $nome_curso usando o cupom $cupom referente ao afiliado $afiliado, realizou o pagamento de R$ $total e respondeu ao formulário com os seguintes dados:
                Nome: $nome
                E-mail: $email
                Telefone: $tel
                Login: $login
                Senha: $senha
                Este e-mail foi enviado em $data_envio às $hora_envio
  ";
}
else{
      $arquivo = " $nome comprou $nome_curso, realizou o pagamento de R$ $total e respondeu ao formulário com os seguintes dados:
                Nome: $nome
                E-mail: $email
                Telefone: $tel
                Login: $login
                Senha: $senha
                Este e-mail foi enviado em $data_envio às $hora_envio
  ";
    
}
  
  $destino = "beatriz.trindade.work@gmail.com";
  $assunto = "Pagamento via Pix";

  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  
  mail($destino, $assunto, $arquivo, $headers);
  
  echo '<script>alert("Informações enviadas com sucesso! Aguarde nosso contato.")</script>';
  echo "<meta http-equiv='refresh' content='0;URL=./services.php'>";

?>
