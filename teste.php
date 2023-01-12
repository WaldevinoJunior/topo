<?php 
    include("valida.php");
    $consulta = "SELECT * FROM alunos ";
    $con = $mysqli->query($consulta) or die($mysqli->error);
    
?>
<html>
    <head><meta charset="utf8"> 
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <script src="js/altera.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
        <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/css/all.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/style.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/componentes/container.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/colors.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/aluno/cursos.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/aluno/continua-curso.css">
    <link rel="stylesheet" href="https://topotreinamentos.com.br/ead/Sistema/public/../resources/views/css/aluno/aulas/testes.css">
    <link rel="sortcut icon" href="img/iconetopo.jpg" type="image/jpg" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <link rel="stylesheet" href="css/aluno/aulas/testes.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/constroi.js"> </script>
    </head>
    <body>
    <nav class="menuTeste">
        <a href="./usuario.php" ><img src="img/iconetopo.jpg"></a>
    </nav>
    <div class="container contbg rounded">
    <div class="cont-header-gray">
        <div class="cont-header-aluno">
            <div class="cont-header-texts ml-auto mr-auto">
            <h1 id="oi">
            <?php 
                $idc=$_GET['nomecurso']; // nome do curso, não id
                if(!isset($_SESSION)){session_start();} echo "<h1>".$idc."</h1>";
                //echo $_SESSION['nome']; 
                echo"<p style='color:black'>Teste da Aula ".$_GET['i2'].": É hora de testar o que você aprendeu!</p>";
            ?>
        </h1>
            </div>
        </div>
    </div>
    <div class="cont-content row">
    <div class="input-group m-5">
        <section  id="formTeste">
        
        
        <form  id="formTeste" method="POST" action="valida.php" style="margin-top:-30px">
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
                        echo "<p class='h5 mb-3 text-justify'>".$linha."</p>";
                    }
                    if($i4 > 2 && $i4<7){
                        $i5++;
                        $linha = str_replace(";;", "", $linha);
                        echo "<div class='d-flex align-items-end'><div class='opcao-botao d-inline-flex mr-2'><input type='radio' class='teste-radio' name='pergunta".$i6."'value='".$i5."'></div><div class='opcao-texto d-inline-flex'>".$linha."</div></div></br>";
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
            echo "<input type='number' style='display:none' name='idcurso' value='".$_GET['idcurso']."'>
            <input type='number' style='display:none' name='aula' value='".$_GET['i2']."'>";
            if(isset($_COOKIE['total'])){
                unset($_COOKIE['total']);
            }
        ?>
        <div class="text-center w-100">
            <a onclick="validar()" class="btn btn-success carousel-btn" id="mostraResultado">Mostrar resultado</a>
            <a href="./usuario.php" class="btn btn-warning carousel-btn" id="VoltarTeste">Voltar</a>
            <br>
        </div>
        </fieldset>
        <div id="nota" style="display:none;flex-direction:column;">
            <h1 id="resul">nota</h1>
            <div>
            <h1 id="result2">nota</h1>
            </div>
        </div>
        <input type="submit" value="Enviar" name="enviarteste"  class="btn btn-success btn-sm" id="enviar" style="display:none;font-size:25px;margin-top:20px">
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
                document.getElementById("resul").innerHTML = "Nota:"+total;
                document.getElementById("enviar").style.display = "block";
                if(total>70){
                    let re = document.getElementById("result2");
                    let imagem = document.createElement("img");
                    imagem.setAttribute("src", "./img/aprovado.png");
                    imagem.setAttribute("id", "imgResul");
                    re.innerHTML = "APROVADO";
                    re.setAttribute("id", "aprov");
                    document.getElementById("nota").appendChild(imagem);
                }
                if(total<70){
                    let re = document.getElementById("result2");
                    let imagem = document.createElement("img");
                    imagem.setAttribute("src", "./img/reprov.png");
                    imagem.setAttribute("id", "imgResul");
                    re.innerHTML = "REPROVADO";
                    re.setAttribute("id", "reprov");
                    document.getElementById("nota").appendChild(imagem);
                }
                document.cookie = "total="+total+"";
            }
        </script>
        </section>
        </div>
        </div>
        </div>
    </body>
</html>