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
        $html2 = $con2->fetch_array()[1];
        //Armazenamento das saídas do arquivo em buffer

        //Envio do valor do buffer para a a classe
        //$dompdf->loadHtmlFile(__DIR__.'/teste.php');
        $dompdf->loadHtml('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link 
        </head>
        <body>
            <h1 id="oi" style="background-color:blue;">Ola mundo</h1>
            <img style="margin-top:100px" src="topo.jpg">
            <h1>oi</h1>
            <h2>oiiiiii</h2>
            ' .$html2 .'
    
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