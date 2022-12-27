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
        <form id="form"  method="post" action="usuario.php">
            <fieldset id="field">
        <?php
            $arq= "cursos/".$_GET['idcurso']."/".$_GET['i2']."/teste.txt";
            $pont = fopen($arq,"r");
            $linha = fgets($pont);
            $i4 = 0;
            $i5 = 0;
            $i6 = 0;
            while($linha){
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
        <a onclick="validar()">mostrar resultado</a>
        </fieldset>
        <div id="nota" style="display:none;">
            <h1>Sua nota foi:</h1><h1 id="resul"> oiii</h1>
        </div>
        <input type="submit" value="Enviar" id="enviar" style="display:none">
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
                }
                document.getElementById("field").style.display = "none"; 
                document.getElementById("nota").style.display = "flex"; 
                document.getElementById("resul").innerHTML = total;
                document.getElementById("enviar").style.display = "block";
            }
        </script>
        </section>
    </body>
</html>