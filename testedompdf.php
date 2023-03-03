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
        }
    $Curso = $mysqli->query("SELECT * FROM aluno_curso_progressos WHERE ID_Aluno = '{$id_Aluno}'");
 while($ccurso = mysqli_fetch_array($Curso)){
            $id_Curso = $ccurso['ID_curso'];
        }
    $Nome_curso = $mysqli->query("SELECT * FROM cursos WHERE ID_Curso = '{$id_Curso}'");
 while($cNome_curso = mysqli_fetch_array($Nome_curso)){
            $nomeCurso = $cNome_Curso['Nome_curso'];
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
                
            }
            div{
                

            }
            </style>
        </head>
        <body>
        <div>
        
            <p style="font-size:15px;margin-left:100px;margin-top:400px;margin-bottom:40px;">O aluno(a) '.$nome.' de CPF '.$cpf.', residente do CEP '.$cep.' matriculou-se no treinamento de '.$nomeCurso.', ministrado por Topo Treinamentos.</p>
            <section style="display:flex">
                    
            </section>
            <p style="font-size:15px;margin-left:490px;margin-top:280px;">Cataguases.</p>
            </body>
        <div style="height:1070px">
            
            
           

        </div>
        </html>
     '
            
        );
        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();

?>

