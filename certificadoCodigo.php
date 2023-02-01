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
        $pass = "";
        $db = "podium";
        $mysqli = new mysqli($host, $user, $pass, $db);
        $historico = "SELECT * FROM historicos WHERE codigo = '{$_GET['codigo']}'";
        $sqlhistorico = $mysqli->query($historico) or die($mysqli->error);
        while($c = mysqli_fetch_array($sqlhistorico)){
            $id = $c['id_aluno'];
            $curso = $c['id_curso'];
        }
        $aluno = "SELECT Nome FROM alunos WHERE ID_Aluno = '{$id}'";
        $sqlAluno = $mysqli->query($aluno) or die($mysqli->error);
        $certi = mysqli_fetch_array($sqlAluno)[0];
        $cursoPesquisa = "SELECT * FROM cursos WHERE ID_Curso = '{$curso}'";
        $cP = $mysqli->query($cursoPesquisa) or die($mysqli->error);
        while($c = mysqli_fetch_array($cP)){
            $nomeCurso = $c['Nome_curso'];
            $descricao =  $c['Descricao'];
            $horas =  $c['Horas'];
        }
        $consulta = "SELECT data_inicio from aluno_curso_progressos WHERE ID_Aluno = '{$id}' and ID_Curso = '{$curso}'";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        while($c = mysqli_fetch_array($con)){
            $dataInicio = date('d/m/Y', strtotime($c['data_inicio']));
        }
        //Armazenamento das saídas do arquivo em buffer
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $data = strftime('%d de %B de %Y', strtotime('today'));
        $consulta2 = "SELECT media,data_fim, codigo from historicos WHERE ID_Aluno = '{$id}' and ID_Curso = '{$curso}'";
        $con2 = $mysqli->query($consulta2) or die($mysqli->error);
        while($c2 = mysqli_fetch_array($con2)){
            $media = $c2['media'];
            $codigo = $c2['codigo'];
            $dataFim = date('d/m/Y', strtotime($c2['data_fim']));
        }
        //Envio do valor do buffer para a a classe
        //$dompdf->loadHtmlFile(__DIR__.'/teste.php');
        $dompdf->loadHtml('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            
            <title>Certificado - '.$nomeCurso.'</title>
            <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                background:url(img/back.jpg);
                background-size: 820px 1070px;
                background-repeat: no-repeat;
            }
            div{
                background:url(img/back2.jpg);
                background-size: 820px 1070px;
                background-repeat: no-repeat;

            }
            </style>
        </head>
        <body>
        
            <p style="font-size:30px;margin-left:220px;margin-top:400px;margin-bottom:40px;">Certificamos que o aluno(a)</p>
            <p style="text-align:center;font-size:30px"> <u>'.$certi.'</u></p><br>
            <p style="font-size:30px;margin-left:50px;margin-bottom:40px;">concluiu o treinamento de '.$nomeCurso.', ministrado por Topo Treinamentos no perído de '.$dataInicio.' a '.$dataFim.', com carga horaria de '.$horas.' horas e com média de '.$media.' pontos.</p>
            <section style="display:flex">
                    
            </section>
            <p style="font-size:20px;margin-left:490px;margin-top:280px;">Cataguases, '.$data.'</p>
            </body>
        <div style="height:1070px">
            
            <p  style="text-align:justify;font-size:20px;margin-left:50px;margin-right:50px;margin-bottom:40px;margin-top:150px;">
            '.$descricao.'<br><br>Código de rastreio: '.$codigo.'</p>
            

           

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