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
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "podium";
        $mysqli = new mysqli($host, $user, $pass, $db);
        
        //Envio do valor do buffer para a a classe
        //$dompdf->loadHtmlFile(__DIR__.'/teste.php');

        $consultaHistoricos = "SELECT * FROM alunos_presenca WHERE ID_Aluno = '{$_GET['alunoid']}'";
                    $conHis = $mysqli->query($consultaHistoricos) or die($mysqli->error);                    
                    $consultaHistoricos = "SELECT * FROM alunos_presenca WHERE ID_Aluno = '{$_GET['alunoid']}'";
                    $conHis = $mysqli->query($consultaHistoricos) or die($mysqli->error);
                       $table = '<table class="table table-striped" id="tableAluno">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>Data</th>';
                                //    $table .= '<th>Responsável</th>';
                                $table .= '<th>Início</th>';
                                $table .= '<th class="esconde">Fim</th>';
                               
                                //    $table .= '<th>CPF</th>';
                                //    $table .= '<th>RG</th>';
                                //    $table .= '<th>CEP</th>';
                                //    $table .= '<th>Estado</th>';
                                //    $table .= '<th>Cidade</th>';
                                //    $table .= '<th>Rua</th>';
                                //    $table .= '<th>Número</th>';
                                //    $table .= '<th>Senha</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
                                while($cH = mysqli_fetch_array($conHis)){
                                    $data = date('d/m/Y', strtotime($cH['Data']));
                                    $table .= "<td> {$data}</td>";
                                    $consultaHorario = "SELECT * FROM horarios";
                                    $conH = $mysqli->query($consultaHorario) or die($mysqli->error);
                                    while($c = mysqli_fetch_array($conH)){
                                        if($cH['ID_Horario'] == $c['ID_Horario']){
                                            $table .= "<td>{$c['Hora_inicio']}</td>";
                                            $table .= "<td class='esconde'>{$c['Hora_fim']}</td>";
                                        }
                                    }                                          
                                        $table .= '</tr></div>';
                                        
                            } 
                        $table .= '</tbody>';
                        $table .= '</table>';
                        echo $table;
                   
                
                        //echo $table;
                   
        $dompdf->loadHtml('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Administração - Topo Treinamentos</title>

            
        </head>
        <body> '
                .$table.'                            
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
                    