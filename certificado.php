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
        include("valida.php");
        session_start();
        $certi = $_SESSION['nome'];
        $nomeCurso = $_GET['nomeCurso'];
        $descricao =  $_GET['descricao'];
        $horas =  $_GET['horas'];
        //Armazenamento das saídas do arquivo em buffer
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        //Envio do valor do buffer para a a classe
        //$dompdf->loadHtmlFile(__DIR__.'/teste.php');
        $dompdf->loadHtml('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            
            <title>Document</title>
            <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                background:url(img/back.jpg);
                background-size: 820px 1100px;
                background-repeat: no-repeat;
            }
            div{
                height:1100px;
                background:url(img/back2.jpg);
                background-size: 820px 1000px;
                background-repeat: no-repeat;

            }
            </style>
        </head>
        <body>
        
            <p style="font-size:30px;margin-left:220px;margin-top:400px;margin-bottom:40px;">Certificamos que o aluno(a)</p>
            <p style="text-align:center;font-size:30px"> <u>'.$certi.'</u></p><br>
            <p style="font-size:30px;margin-left:50px;margin-bottom:40px;">concluiu o treinamento de '.$nomeCurso.', ministrado por Topo Treinamentos no perído de '.$data.' a '.$data.', com carga horaria de '.$horas.' horas.</p>
            <section style="display:flex">
                    
            </section>
            <p style="font-size:20px;margin-left:600px;margin-top:280px;">Cataguases, '.$data.'</p>
            </body>
        <div>
            
            <p  style="text-align:justify;font-size:20px;margin-left:50px;margin-right:50px;margin-bottom:40px;margin-top:150px;">
            '.$descricao.'<br><br>Código de rastreio: '.$data.'</p>
            

           

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