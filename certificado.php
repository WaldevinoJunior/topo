
        <?php

        require_once 'vendor/autoload.php'; // carregando o autoload
        
        use mikehaertl\wkhtmlto\Pdf; //instanciando a classe de Pdf
        
        $binary = 'c:/xampp2/htdocs/topo/wkhtmltopdf/bin/wkhtmltopdf.exe'; //definindo o caminho do binário
        
        $pdf = new Pdf(); //definindo qual a URL a ser transformada em PDF
        $pdf->addPage('https://www.google.com');
        $pdf->binary = $binary; //setando o binário
        
        if (!$pdf->saveAs('google.pdf')) { //salvando como google.pdf e verificando erros
            $error = $pdf->getError();
            print($error);
        }

    ?>