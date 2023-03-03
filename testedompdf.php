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



   
     $aluno = $mysqli->query("SELECT * FROM alunos WHERE CPF = '{$cpf}'");
 
      while($caluno = mysqli_fetch_array($aluno)){
            $nome = $caluno['Nome'];
            $cep =  $caluno['CEP'];
            $id_Aluno =  $caluno['ID_Aluno'];
            $data_limite = $caluno['data_limite'];
            $resp = $caluno['Responsavel'];
            $end = $caluno['Rua']. " ".$caluno['Numero']." ".$caluno['Complemento']." ".$caluno['Cidade']." - ".$caluno['Estado'];
            $tel = $caluno['Telefone'];
            $nasc = $caluno['Nascimento'];
            $rg = $caluno['RG'];
            $resptel = $caluno['Responsavel_numero'];
        }
    $franqueado = $mysqli->query("SELECT * FROM cursos_franqueados WHERE ID_Aluno = '{$id_Aluno}'");
      
       while($cfranqueado=mysqli_fetch_array($franqueado)){
      $idfranqueado=$cfranqueado['ID_franqueador'];
           
      }
      
      $nomefranqueado = $mysqli->query("SELECT Nome FROM franqueados WHERE ID_franqueador = '{$idfranqueado}'");
      

      
     
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
                  $precototal+=($callcurso['Preco']);
              }
          }
    
      }

     echo $nomeCurso;   
    
     
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
                display: flex;
                flex-direction: collum;
            }
            div{
                display: block;
            }
            .direito{
            float:left;
            width:200px;
            }
            .littledireito{
            float:left;
            width:70px;
            }
            .esquerdo{
            float:right;
            width:200px;
            }
            .littleesquerdo{
            float:right;
            width:70px;
            }
            </style>
        </head>
        <body>
        <div>
        <p style="font-size:13px;margin-left:60%;margin-top:30px;">CONTRATO DE PRESTAÇÃO DE SERVIÇOS</p>
        <div class="direito">
        <p style="font-size:10px;margin-left:20%;margin-top:60px;">Nº do Contrato: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;">Convênio: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;">Nº de Parcelas:  </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;">Valor Entrada:  </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;">Valor do Curso com Desconto:  </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;">Valor do Curso sem Desconto: R$'.$precototal.',00 </p>
        </br>
        <p style="font-size:10px;margin-left:20%;margin-top:20px;">Cursos Contratados: </p>
        <p style="font-size:10px;font-weight:bold;margin-left:20%;margin-top:10px;"> '.$nomeCurso.'</p>
        </br>
        <p style="font-size:10px;margin-left:20%;margin-top:20px;">Horários: </p>
        <p style="font-size:10px;font-weight:bold;margin-left:20%;margin-top:10px;"> Dia e hora</p>
        </br>
        <p style="font-size:10px;font-weight:bold;margin-left:20%;margin-top:20px;">Contratado: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Razão Social:</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Nome Fantasia:</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> CNPJ:</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Telefone:</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Endereço:</p>    
         </br>
        <p style="font-size:10px;font-weight:bold;margin-left:20%;margin-top:20px;">Contratante: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Nome: '.$nome.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Endereço: '.$end.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> CEP: '.$cep.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Telefone: '.$tel.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Data de Nascimento: '.$nasc.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> RG: '.$rg.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> CPF: '.$cpf.'</p>
         </br>
        <p style="font-size:10px;font-weight:bold;margin-left:20%;margin-top:20px;">Representante Legal: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Nome: '.$resp.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Endereço: '.$end.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> CEP: '.$cep.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Telefone: '.$resptel.'</p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> Data de Nascimento: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> RG: </p>
        <p style="font-size:10px;margin-left:20%;margin-top:10px;"> CPF: </p>
        
        </div>
        <div class="esquerdo">
        <p style="font-size:10px;margin-right:0%;margin-top:60px;">Código do Aluno: '.$id_Aluno.' </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Desconto:  </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">1º Vencimento: '.$data_limite.' </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Carga Horária: '.$cargahoraria.' </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Valor da Parcela com Desconto: </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Valor da Parcela sem Desconto: </p>
        </br>
        <p style="font-size:10px;margin-right:0%;margin-top:20px;"> . </p>
        <p style="font-size:10px;font-weight:bold;margin-right:0%;margin-top:10px;"> '.$horaCurso.' </p>
        </div>
        
        <div class="texto">
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Através do presente Contrato de Prestação de Serviços, de um lado o Aluno ou responsável acima descrito, contrata os serviços do _____ cuja razão social é _____________, estabelecida no endereço ____________ e conforme as cláusulas e condições abaixo.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">1ª - A contratada se compromete a ministrar ao contratante os cursos de informática e(ou) cursos profissionalizantes e (ou) cursos de idiomas conforme horário, valores e condições de pagamento constantes na 1ª página. </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">2ª - O presente contrato tem vigência definida pelo período total da carga horária contratada, de acordo com cada curso, podendo o mesmo se encerrar com menos tempo ou mais tempo que o previsto, já que existe uma previsão de duração que depende do desempenho individualizado de cada aluno.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">Paragráfo único: Será concedida uma carência de mais de 8 hora além da carga horária prevista para o término do curso. Quando a duração do curso ultrapassar essa carência, será cobrado do contratante um valor adicional proporcional à carga horária excedente.  </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">3ª - O simples não comparecimento para as aulas, sem comunicação a contratada, não configura em cancelamento do curso, não isentando, portanto, o contratante dos pagamentos devidos. O aluno que não comparecer a uma aula, se responsabilizará pela ausência. Terá direito a reposição sem ônus, mediante apresentação de atestado médico ou de trabalho, até 10 por cento do total de horas contratadas. Após a 2ª falta consecutiva, sem justificativa, a escola entrará em contato com o responsável para identificar o motivo gerador da falta e o aluno perderá o direito a reposição sem custos. Para o aluno que faltou sem justificativa e queira repor a aula será cobrado o valor da tabela vigente, que deverá ser pago no dia agendado para a reposição.  </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">4ª - Se o aluno maracr horários para trabalhos, internet, treinamentos, reposição de aula e não comparecer deverá comunicar a escola com 24 horas de antecedência. Só terá direito de a marcar um novo horário sem custo, mediante atestado médico ou de trabalho. </p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">O aluno que necessitar trocar de horário, se for menor de idade, deverá ser solicitado por seu responsável junto à secretaria. A troca somente será realizada se houver vaga no horário pretendido. A partir da 2ª troca será cobrado taxa, conforme tabela vigente a cada troca.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">6ª - O aluno que optar por Horários Indefinidos deverá assistir no mínimo uma aula por semana. Sua ausência, à aula, será registrada como falta. A reposiçãodesta aula obedecerá a Cláusula 3ª.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">7ª - É defeso o acesso a sites pornográficos, e de inteira e exclusiva responsabilidade do CONTRATANTE e/ou responsável legal o conteúdo inserido ou disponibilzado por estes em sites de relacionamento, bem como transmissões via e-mail ou mensagens instantâneas, não havendo ingerência da Escola, por se tratar de instrumentos de propriedade exclusiva de seus idealizadores, posto que a mesma não controla o conteúdo disponibilizado em tais serviços.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">8ª - É obrigatória a compra do material didático dos cursos de idiomas. Já os demais cursos, a compra do material didático é opcional. Caso o aluno queira adquiri-los, consultar a tabela.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">9ª - Ao final do curso, conforme contrato, será concedido Certificado de Conclusão ao aluno que compareceu no mínimo a 75% das aulas ministradas e obteve aproveitamento igual ou superior a 70%.</p>
        <p style="font-size:10px;margin-right:0%;margin-top:10px;">10ª - No caso de atraso no pagamento de qualquer parcela, o valor desta será acrescido de multa de 2% e juros de mora de 0,06% ao dia. O atraso, eventual, tolerado após o vencimento não caracteriza uma novação contratual. Esta liberalidade não significa alteração nas datas já previstas para pagamento. </p>
        
        </div>
        
    
            <section style="display:flex">
                    
            </section>
            
            </body>
        <div style="height:1070px">
            
            
           

        </div>
        </html>
     ');
    
        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();
    
?>

