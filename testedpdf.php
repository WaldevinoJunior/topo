<?php
        require __DIR__.'/vendor/autoload.php';
        use Dompdf\Dompdf;
        use Dompdf\Options;
        //Instanciação do objeto options
        $options = new Options();
        //Configuração da root para o diretório atual
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);
        //Instanciação do objeto dompdf
        $dompdf = new Dompdf($options);
        $host = "localhost";
        $user = "root";
        $pass = " ";
        $db = "podium";
        $mysqli = new mysqli($host, $user, $pass, $db);
        
        $parcelas = 6;
     setlocale(LC_ALL,'pt_BR.UTF8');
      mb_internal_encoding('UTF8'); 
      mb_regex_encoding('UTF8');
        date_default_timezone_set('America/Sao_Paulo');
        $data = strftime('%d de %B de %Y', strtotime('today'));
      
     $aluno = $mysqli->query("SELECT * FROM alunos WHERE CPF = '{$cpf}'");
      
 
      while($caluno = mysqli_fetch_array($aluno)){
            $nome = $caluno['Nome'];
            $cep =  $caluno['CEP'];
            $id_Aluno =  $caluno['ID_Aluno'];
            $data_limite = date('d/m/y', strtotime($caluno['data_limite']));
            $resp = $caluno['Responsavel'];
          $cidade = $caluno['Cidade'];
            $end = $caluno['Rua']. " ".$caluno['Numero']." ".$caluno['Complemento']." ".$caluno['Cidade']." - ".$caluno['Estado'];
            $tel = $caluno['Telefone'];
            $nasc = $caluno['Nascimento'];
            $rg = $caluno['RG'];
            $resptel = $caluno['Responsavel_numero'];
        }
    $franqueado = $mysqli->query("SELECT * FROM cursos_franqueados WHERE ID_Aluno = '{$id_Aluno}'");
    $afiliado = $mysqli->query("SELECT * FROM cursos_afiliados WHERE ID_Aluno = '{$id_Aluno}'");
      
       while($cfranqueado=mysqli_fetch_array($franqueado)){
      $idfranqueado=$cfranqueado['ID_franqueador'];
           
      }
      
      
      $nomefranqueado = $mysqli->query("SELECT * FROM franqueados WHERE ID_franqueados = '{$idfranqueado}'");
      
 while($cnomefranqueado=mysqli_fetch_array($nomefranqueado)){
      $nome_franqueado=$cnomefranqueado['Nome'];
     $cnpj_franqueado=$cnomefranqueado['CNPJ'];
     $tel_franqueado=$cnomefranqueado['Telefone'];
    $end_franqueado = $cnomefranqueado['Rua']. " ".$cnomefranqueado['Numero']." ".$cnomefranqueado['Complemento']." - ".$cnomefranqueado['Bairro']." , ".$cnomefranqueado['Cidade']." - ".$cnomefranqueado['Estado'];
           
           
      }
      
       while($cafiliado=mysqli_fetch_array($afiliado)){
      $idafiliado=$cafiliado['ID_afiliados'];
           
           
      }
      
      $nomeafiliado = $mysqli->query("SELECT * FROM afiliados WHERE ID_afiliados = '{$idafiliado}'");
      
      while($cnomeafiliado=mysqli_fetch_array($nomeafiliado)){
      $nome_afiliado=$cnomeafiliado['Nome'];
      $cnpj_afiliado=$cnomeafiliado['CNPJ'];
     $tel_afiliado=$cnomeafiliado['Telefone'];
    $end_afiliado = $cnomeafiliado['Rua']. " ".$cnomeafiliado['Numero']." ".$cnomeafiliado['Complemento']." - ".$cnomeafiliado['Bairro']." , ".$cnomeafiliado['Cidade']." - ".$cnomeafiliado['Estado'];
           
           
      }
     
       $Horario = $mysqli->query("SELECT ID_Horario FROM horarios_alunos WHERE ID_Aluno = '{$id_Aluno}'");
    $chora = [];
       while($chorario=mysqli_fetch_array($Horario)){
      $chora[]=$chorario['ID_Horario'];
      }
      
      $allhorario = $mysqli->query("SELECT * FROM horarios");
      while($callhorario=mysqli_fetch_array($allhorario)){
          for($i=0;$i<count($chora);$i++)
          {
              if($callhorario['ID_Horario']==$chora[$i])
              {
                  $dia .=($callhorario['Dia'] . " |<b>  " .$callhorario['Hora_inicio'] . "  -  " .$callhorario['Hora_fim'] . " |</br> ") ;
              }
          }
    
      }
      
    $Curso = $mysqli->query("SELECT ID_Curso FROM aluno_curso_progressos WHERE ID_Aluno = '{$id_Aluno}'");
    $cid = [];
     
      while($c=mysqli_fetch_array($Curso)){
      $cid[]=$c['ID_Curso'];
      }
      
    $nomeCurso = " ";
      $horaCurso = " ";
      $cargahoraria = 0;
      $precototal = 0;
      

         $allcurso = $mysqli->query("SELECT * FROM cursos");
      while($callcurso=mysqli_fetch_array($allcurso)){
          for($i=0;$i<count($cid);$i++)
          {
              if($callcurso['ID_Curso']==$cid[$i])
              {
                  $nomeCurso .=($callcurso['Nome_curso'] . " </br> ");
                  $horaCurso .=($callcurso['Horas'] . " horas </br> ");
                  $cargahoraria+=($callcurso['Horas']);
                  $precototal+=number_format($callcurso['Preco'],2,",",".");
              }
          }
    
      }

     $precopparcela = ($precototal)/($parcelas);   
      $precopparcela = number_format($precopparcela,2,",",".");
    
     if(!empty($nome_afiliado))
     {
         $emp_nome = $nome_afiliado;
         $emp_cnpj = $cnpj_afiliado;
         $emp_tel = $tel_afiliado;
         $emp_end = $end_afiliado;
     }
        
       if(!empty($nome_franqueado))
     {
         $emp_nome = $nome_franqueado;
         $emp_cnpj = $cnpj_franqueado;
         $emp_tel = $tel_franqueado;
         $emp_end = $end_franqueado;
     }
      
      
        //Envio do valor do buffer para a a classe
        //$dompdf->loadHtmlFile(__DIR__.'/teste.php');
        $dompdf->loadHtml('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            
            <title>Teste</title>
            <style>
            *{
                margin:0;
                padding:0;
            }
            body{
               
            }
           
            </style>
        </head>
        <body>
        
            <p style="font-size:30px;margin-left:220px;margin-top:400px;margin-bottom:40px;">Teste</p>
            <p> Olá, '.$nome.' </p>
           
            </section>
            <p style="font-size:20px;margin-left:490px;margin-top:280px;">Cataguases, '.$data.'</p>
            </body>
        
        </html>
     '
            
        );
        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();
    ?>