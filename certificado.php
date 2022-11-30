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
            <img style="margin-left:350px;margin-top:100px;height:200px;width:100px"src="img/logo_topo.png">
            <h1 style="color:darkorange;margin-left:130px;font-size:80px">CERTIFICADO</h1>
            <p style="font-size:30px;margin-left:220px;margin-top:20px;margin-bottom:40px;">Certificamos que o aluno(a)</p>
            <p style="text-align:center;font-size:30px"> <u>'.$certi.'</u></p><br>
            <p style="font-size:30px;margin-left:50px;margin-bottom:40px;">concluiu o treinamento de '.$certi.', ministrado por Topo Treinamentos no perído de '.$data.', com carga horaria de </p>
            <p style="font-size:30px;margin-left:290px";>______________</p>
            <p style="font-size:30px;margin-left:340px;margin-bottom:40px;">  Aluno(a)</p>
            <section style="display:flex">
            <img style="width:150px;margin-left:200px" src="img/assinatura.jpg">
            
            <img style="width:150px;margin-left:90px" src="img/assinatura2.jpg">
            
            <p style="margin-left:220px;word-spacing:140px;font-size:30px">Instrutor   Direção</p>
            </section>
            <p style="font-size:20px;margin-left:600px;margin-top:90px;color:red;">Cataguases, '.$data.'</p>
            </body>
        <div>
            <img style="width:600px;margin-left:120px;margin-top:30px" src="img/cabeçalho.jpg">
            <img style="width:100px;height:100px;margin-left:30px"src="img/assinatura3.jpg">
            <a href="www.topotreinamentos.com.br">www.topotreinamentos.com.br</a>
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