<?php include("valida.php"); 
    $consulta = "SELECT * FROM alunos ";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>
<html>
    <head><meta charset="utf8"> 
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <script src="js/altera.js"></script>
    </head>
    <body>
        <section>
        <h2 id="oi">Aluno</h2>
        <form onsubmit = "validar()">
            <fieldset>
        <?php
            $arq= "cursos/60/1/teste.txt";
            $pont = fopen($arq,"r");
            $linha = fgets($pont);
            $i4 = 0;
            $i5 = 0;
            $i6 = 0;
            while($linha){
                //echo "<p style='display:block'>".$linha."</p>";
                if(substr_count($linha, ';;')){
                    if($i4 == 0){
                        echo "<div>";
                    }
                    $i4++;
                    if($i4 == 2){
                        $linha = str_replace(";;", "", $linha);
                        echo "<p>".$linha."</p>";
                    }
                    if($i4 > 2 && $i4<7){
                        $i5++;
                        $linha = str_replace(";;", "", $linha);
                        echo "<input type='checkbox' name='pergunta".$i6."'value='".$i5."'>".$linha."</br>";
                    }
                    if($i4 == 7){
                        $i4 = 0;
                        $i5 = 0;
                        $linha = str_replace(";;", "", $linha);
                        $inteiro = (int)$linha;
                        echo "<a style='display:none' value='".$inteiro."' id='resposta".$i6."'></a>";
                        $i6++;
                        echo "</div><br>";
                    }
                }
                $linha = fgets($pont);
            }
            echo "<a style='display:none' id='quant' value='".$i6."'></a>";
        ?>
        <input type="submit" value="Enviar">
        </fieldset>
        </form>
        
        <script type="text/javascript">  
            function validar(){
                let a = document.getElementById("quant").getAttribute("value");
                let r = 100/a;
                let total = 0;
                for(let i= 0; i<a;i++){
                    let checkboxes = document.getElementsByName("pergunta"+i);
                    let respostas = document.getElementById("resposta"+i);  
                    let iCheck = 0;  
                    for(let i2 = 0; i2 < checkboxes.length; i2++){  
                        if(checkboxes[i2].checked){
                            iCheck++; 
                            if(checkboxes[i2].getAttribute("value") === respostas.getAttribute("value")){
                                total+=r;
                            }
                        }   
                    }
                    if(iCheck == 0){  
                        i++;
                        alert("Você não marcou nenhuma opção na pergunta numero "+i);  
                        return false;  
                    }  
                    if(iCheck > 1){  
                        i++;
                        alert("Você marcou mais de uma vez na pergunta numero "+i);  
                        return false;  
                    }
                    alert("sua nota foi:"+total+""); 
                }
                alert("sua nota foi:"+total+"");  
            }
        </script>
        </section>
       
    </body>
</html>