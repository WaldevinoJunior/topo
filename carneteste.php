<?php
/*$cpdf = "<html>";
    $cpdf .= "<head>";
    $cpdf .= "</head>";
    $cpdf .= "<body>";
    $cpdf .= "Nome:" .$dados['nome']. "<br><br>";
    $cpdf .= "Nascimento: " .$dados['nascimento']. "<br><br>";
    $cpdf .= "E-mail: " .$dados['email']. "<br><br>";
    $cpdf .= "Telefone: " .$dados['telefone']. "<br><br>";
    $cpdf .= "CPF: " .$dados['cpf']. "<br><br>";
    $cpdf .= "Estado: " .$daods['estado']. "<br><br>";
    $cpdf .= "</body>";
    $cpdf .= "</html>";
    
    echo $cpdf;
    */
//a
$cpf = $_GET['cpf'];

?>
  <script> var cpf = "<?php echo $cpf ?>"
    
    console.log(cpf);
    
    </script>
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
        $pass = "bia999665";
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
      
       $hoje = date('d/m/y');
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
            
            <title>Contrato </title>
            <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                font-family: arial, helvetica, sans-serif;
                font-size: 10px;
                display: flex;
                width:100%;
                

            }
            .texto{
                text-align: justify;
                
                
            }
            tr{
            border: 1px solid;
            }
            th{
            text-align: left;
            border: 1px solid;
            }
            table{
            border: 1px solid;
            margin: 0;
            }
          
            .break { page-break-before: always; }
            
            .none{
            border: 0;
            padding: 3px;
    
            }
            .mes{
            margin-left: 70px;
            width:700px;
            display: block;
            position: fixed;
            }
           
           
            </style>
        </head>
        <body>
        </br>
        </br>
        
        
<div class="mes">
       <table>
  <tr>
  <th class="none" colspan="1">Recibo do pagador </br>  ________________</th>
    <th colspan="5">Local para pagamento </br> Pagável em todos os bancos.</th>
    <th colspan="1">Nosso número </br> xxxxxxxxxxxxx</th>
     </tr>
     
  
  <tr>
  <th class="none" colspan="1">Nosso número </br>  xxxxxxxxxxxxx  </br>  ________________</th>
    <th colspan="3">Beneficiário final: </br> '.$emp_nome.'</th>
    <th colspan="2">Intermediado por: </br> - </th>
    <th colspan="1">Vencimento </br> '.$data_limite.'</th>
  </tr>
    
  <tr>
  <th class="none" colspan="1">Vencimento </br> '.$data_limite.' </br>  ________________ </th>
    <th colspan="1">Data do documento </br> '.$hoje.'</th>
    <th colspan="1">Nº do documento </br> - </th>
    <th colspan="1">Espécie Doc. </br> - </th>
    <th colspan="1">Aceite </br> - </th>
    <th colspan="1">Data processamento </br> '.$hoje.'</th>
    <th colspan="1" rowspan="2">Valor do documento </br> '.$precopparcela.'</th>
  </tr>
    
    <tr>
    <th class="none" colspan="1">Valor </br> '.$precopparcela.' </br>  ________________</th>
    <th colspan="1">Uso do banco </br> - </th>
    <th colspan="1">Carteira </br> - </th>
    <th colspan="1">Moeda </br> - </th>
    <th colspan="1">Quantidade </br> - </th>
    <th colspan="1">(x) valor </br> - </th>
  </tr>
   
   <tr>
    <th class="none" colspan="1" rowspan="1">Valor cobrado </br> '.$precopparcela.'</br>  ________________</th>
    <th colspan="5" rowspan="2">Instruções(Todas as informações deste bloqueto são de exclusiva responsabilidade do beneficiário) </br> Após vencimento: Multa 2,00% Juros </br> Aluno: '.$nome.'</br> Sacador avalista: '.$emp_nome.' ('.$emp_cnpj.')</th>
    <th colspan="1">Multa/Juros/Descontos </br> - </th>
    </tr>
    <tr>
    <th class="none" colspan="1" rowspan="1">Pagador </br> '.$resp.'</br>  ________________</th>
  <th colspan="1"> (=)Valor </br> - </th>
  </tr>
  
 
</table>
</div>
      
            </body>
       
        </html>
     ');
        //Renderização do arquivo PDF
        $dompdf->render();
    
        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();
    
?>

