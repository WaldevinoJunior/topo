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
    $consultaAlunos = "SELECT * from alunos WHERE ID_Aluno = '{$_GET['alunoid']}'";
    $consultaColab = "SELECT * from colaboradores";
    $consultaCursos = "SELECT * from cursos";
    $conAlunos = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conAlunos2 = $mysqli->query($consultaAlunos) or die($mysqli->error);
    $conColab = $mysqli->query($consultaColab) or die($mysqli->error);
    $conCursos = $mysqli->query($consultaCursos) or die($mysqli->error);
    session_start();
    if($_SESSION['verifica'] != 2){
        header('Location: ./index.html');
    }
    
        
        $consultaHistoricos = "SELECT * FROM aluno_testes WHERE ID_Aluno = '{$_GET['alunoid']}'";
                    $conHis = $mysqli->query($consultaHistoricos) or die($mysqli->error);
                    $consultaPro= "SELECT * from aluno_curso_progressos WHERE ID_Aluno = '{$_GET['alunoid']}'";
                       $conPro = $mysqli->query($consultaPro) or die($mysqli->error);
                       while($c = mysqli_fetch_array($conPro)){
                            $id[] = $c['ID_Curso'];
                       }
                       
                       while($c = mysqli_fetch_array($conCursos)){
                         for($i=0;$i<count($id);$i++){
                            if($id[$i] == $c['ID_Curso']){
                                $curso[] = $c['ID_Curso'];
                                $nome[] =$c['Nome_curso'];
                            }
                         }
                       }
                      

                       $table = '<table style="text-align:center" class="table table-striped" id="tableAluno">';
                            $table .='<thead>';
                                $table .= '<tr>';
                                   $table .= '<th>Curso</th>';
                                $table .= '<th>Aula</th>';
                                $table .= '<th>Nota</th>';
                                $table .= '</tr>';
                            $table .= '</thead>';
                            $table .= '<tbody>';
                            

                                while($cH = mysqli_fetch_array($conHis)){
                                    $table .= '<tr>';
                                        for($i=0;$i<count($curso);$i++){
                                            if($curso[$i] == $cH['ID_Curso']){
                                                $table .= "<td> {$nome[$i]}</td>";
                                                $table .= "<td> {$cH['Numero_aula']}</td>";
                                                $table .= "<td> {$cH['Nota']}</td>";
                                            }
                                        }                                        
                                        $table .= '</tr>';
                                        
                            } 
                        $table .= '</tbody>';
                        $table .= '</table>';
                        
                        $dompdf->loadHtml('
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Administração - Topo Treinamentos</title>
                
                            
                        </head>
                        <body> 
                        <h3> Histórico de Testes do(a) Aluno(a): '.$_GET['nome'].'</h3>'
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
                            