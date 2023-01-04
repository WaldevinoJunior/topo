<?php
 include("valida.php");
 if(isset($_FILES['imagem'])){
    $arquivopng = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
    if(!isset($_SESSION)){session_start();}
    $query_arquivo = "UPDATE alunos SET imagem = '{$arquivopng}' WHERE ID_Aluno = '{$_SESSION['ID_Aluno']}'";
    $resultado = $mysqli->query($query_arquivo) or die($mysqli->error);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topo Treinamentos</title>
    <link rel="sortcut icon" href="img/iconetopo.jpg" type="image/jpg" />
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="js/constroi.js"> </script>
</head>
<!-- CORPO DA PAGINA USUARIO -->
<body class="usuario">
    <!-- CABEÇALHO DA PAGINA -->
    <nav id="nav">
        <img style="width:100%; height: 30vh;" src="img/logonav.png">
        
    </nav>
    <div sytle="display:flex;">
    <div id="modal">   
        <button type="button" onclick="fecha()">X</button>
                <h3>Selecione um avatar</h3>
                    <form  method="POST" enctype="multipart/form-data">
		                <label for="imagem">Imagem:</label>
		                <input type="file" name="imagem"/>
		                <input type="submit" value="Enviar"/>
	                </form>
        </div>
    </div>
    <!-- TROCA AVATAR DO USUARIO E VOLTA NA PAGINA INICIAL -->
    <div class="usuarioDiv" name="usuarioDiv">
        <?php 
        if(!isset($_SESSION)){session_start();}
        $arquiv = "SELECT imagem FROM alunos WHERE ID_ALUNO = '{$_SESSION['ID_Aluno']}'";
        $result = $mysqli->query($arquiv) or die($mysqli->error);
        $row = mysqli_fetch_array($result);
        echo '<img id="fotoLogin" src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '" />';
        ?>>
        <div id="usuarioId">
        <p style="font-size:30px;margin-top:-5vh;margin-bottom:2vh"><?php if(!isset($_SESSION)){session_start();}
            echo $_SESSION['nome'];
            ?>
        </p>
        
        <button type="button" onclick="altera();">Alterar Avatar</button>
        <a href="index.html">SAIR</a>
        <a href="certificado.php">BAIXAR</a>
        </div>
    </div> 
    <h1 id="h1curso">Seus Cursos</h1>
    <!--CURSOS DO ALUNO -->
   <div id="cursos"> 
   <div id="cursoCont">
        <a href="javascript:volta();">Voltar</a>
    </div>
    <?php 
        /*
        $consulta = "SELECT * FROM cursos";
        $consulta2 = "SELECT * FROM aluno_curso_progressos";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        $con2 = $mysqli->query($consulta2) or die($mysqli->error);
        $i = 0;
        while($c2 = mysqli_fetch_array($con2)){
            if($c2['ID_Aluno'] ==  $_SESSION['ID_Aluno']){
                while($c = mysqli_fetch_array($con)){ 
                    if($c['ID_Curso'] == $c2['ID_Curso']){
                        echo "<div style='text-align:center' id = 'oi'>".$c['Nome_curso']."<img  src='img/apertomao.jpg'>"
                        ."<a>Acessar Curso</a>"."</div>";
                        $i++;
                        break;
                    }
                } 
            } 
         }
         while($i>0){
            echo "<script>adcElemento()</script>";
            $i--;
         }
         
        */
        $oi = $_SESSION['ID_Aluno']; $i = 0;
        $consulta = "SELECT cursos.Nome_curso, cursos.ID_Curso from alunos join aluno_curso_progressos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno join cursos ON cursos.ID_Curso = aluno_curso_progressos.ID_Curso WHERE alunos.ID_Aluno = $oi";
        $con = $mysqli->query($consulta) or die($mysqli->error);
        $i3 = 0;
        echo "<script>let i6 = 0;</script>";
        while($c = mysqli_fetch_array($con)){
            $oi2 = $c['ID_Curso'];
            $consulta2 = "SELECT cursos.aulas_totais from cursos join aluno_curso_progressos ON aluno_curso_progressos.ID_Curso = cursos.ID_Curso join alunos ON aluno_curso_progressos.ID_Aluno = alunos.ID_Aluno WHERE alunos.ID_Aluno = $oi and cursos.ID_Curso = $oi2";
            $con2 = $mysqli->query($consulta2) or die($mysqli->error);
            $aulas = mysqli_fetch_array($con2)[0];
            $i5 = [$aulas];
            echo "<div style='text-align:center' id = 'oi'>".$c['Nome_curso']."<img  src='cursos/".$c['ID_Curso']."/".$c['ID_Curso'].".png'>"
                        ."<a onclick='mostraCurso".$c['ID_Curso']."();'>Acessar Curso</a></div><script>
                            function mostraCurso".$c['ID_Curso']."(){
                            let d = document.getElementsByClassName('cursoConteudo');
                            let u = document.querySelectorAll('#oi2');;
                            let e = document.getElementsByClassName('cursoTela');
                            for (let i = 0; i < e.length; i++) {
                              e[i].style.display = 'none';
                            }
                            document.getElementById('cursoCont').style.display = 'block';
                            let i2 = 0;            
                            for(let i3 = 0; i3 < d.length; i3++){
                               if(i2<u.length && u[i3].getAttribute('name') ==".$c['ID_Curso']."){
                                     d[i3].style.display = 'block';
                                     i2++;
                                }
                            }
                         }
                        </script>";
            for($i2 = 1; $aulas >= $i2;$i2++){
                echo "<div style='text-align:center;display:none' id = 'oi2' name='".$c['ID_Curso']."'>Aula:".$i2."<img  src='cursos/".$c['ID_Curso']."/".$i2."/img/0.jpg'>"
                ."<a onclick='mostraFase".$c['ID_Curso']."aula".$i2."()'>Fase ".$i2."</a></div>";
                echo "<div id='modal2' name='Curso".$c['ID_Curso']."Aula".$i2."'>
                <a onclick='fechaFase".$c['ID_Curso']."aula".$i2."()' style='background-color:red;cursor:pointer'>xx</a>
                <div id='modal2Cont'>Curso:".$c['ID_Curso']." Aula:".$i2." 
                </div>
                <div id='modal2Op'>
                <a id='aula".$i2."".$c['ID_Curso']."'onclick='mostraAula".$c['ID_Curso']."aula".$i2."()'  style='pointer-events: none;color:gray;'><i class='bi bi-cast'></i> -------</a>
                <a  id='passo".$i2."".$c['ID_Curso']."' target='_blank' href='cursos/".$c['ID_Curso']."/".$i2."/passo-a-passo.pdf'  style='pointer-events: none;color:gray;'><i class='bi bi-postcard'></i> -------</a>
                <a  id='fixacao".$i2."".$c['ID_Curso']."' target='_blank' href='cursos/".$c['ID_Curso']."/".$i2."/fixacao.pdf'  style='pointer-events: none;color:gray;'><i class='bi bi-pencil-square'></i>  -------</a>
                <a  id='teste".$i2."".$c['ID_Curso']."' href='teste.php?i2=".$i2."&&idcurso=".$c['ID_Curso']."'  style='pointer-events: ;color:gray;'><i class='bi bi-journal-check'></i></a>
                ";if($i2 == $aulas){
                    echo "<a href='cursos/".$c['ID_Curso']."/".$i2."/teste.txt' style='pointer-events: none;color:gray;'>-----<i class='bi bi-filetype-pdf'></i></a>";
                }echo "</div>
                </div>
                <script>";
                    if($i2 == 1){
                         echo   "document.getElementById('aula".$i2."".$c['ID_Curso']."').style.pointerEvents = 'auto';
                                 document.getElementById('aula".$i2."".$c['ID_Curso']."').style.color = 'green';
                                 document.getElementById('aula".$i2."".$c['ID_Curso']."').style.cursor = 'pointer';";
                    }
                    echo"
                    function mostraFase".$c['ID_Curso']."aula".$i2."(){
                        let contFase = document.getElementsByName('Curso".$c['ID_Curso']."Aula".$i2."');
                        contFase[0].style.display = 'block';
                    }
                    function fechaFase".$c['ID_Curso']."aula".$i2."(){
                        let contFase = document.getElementsByName('Curso".$c['ID_Curso']."Aula".$i2."');
                        contFase[0].style.display = 'none';
                    }
                </script>";
                $i3++;
                $i4 = 0;
                if($c['ID_Curso']==60){
                    $pasta = new FilesystemIterator ("cursos/60/".$i2."/img");
                    foreach($pasta as $file){
                        $arq= "cursos/60/".$i2."/paginas/".$i4.".txt";
                        $pont = fopen($arq,"r");
                        $linha = fgets($pont);
                        while($linha){
                            echo "<p id='60".$i2."".$i4."' style='display:none'>".$linha."</p>";
                            $linha = fgets($pont);
                        }
                        
                        $i4++;
                    //echo $pasta."<br>";
                    }
                }
                $i5[$i2] = $i4;
                echo 
            "<script>
                function mostraAula".$c['ID_Curso']."aula".$i2."(){
                let b = document.body;
                document.getElementById('nav').style.display = 'none';
                document.getElementById('h1curso').style.display = 'none';
                document.getElementsByClassName('usuarioDiv')[0].style.display = 'none';
                document.getElementById('cursos').style.display = 'none';
                let aula = document.createElement('div');
                let imagem = document.createElement('img');
                let audio = document.createElement('audio');
                let prox = document.createElement('button');
                let vol = document.createElement('button');
                let sair = document.createElement('button');
                let textoAula = document.createElement('div');
                textoAula.setAttribute('id','textoAula');
                sair.setAttribute('id', 'sair');
                sair.setAttribute('onclick', 'sair".$c['ID_Curso']."aula".$i2."()');
                sair.innerHTML = 'sair';
                prox.setAttribute('id', 'prox".$c['ID_Curso']."aula".$i2."');
                vol.setAttribute('id', 'vol".$c['ID_Curso']."aula".$i2."');
                prox.innerHTML = 'proxima';
                vol.innerHTML = 'voltar';
                prox.setAttribute('onclick', 'prox".$c['ID_Curso']."aula".$i2."()');
                vol.setAttribute('onclick', 'vol".$c['ID_Curso']."aula".$i2."()');
                aula.setAttribute('id' , 'aulaEstilo');
                b.appendChild(aula);
                aula.appendChild(textoAula);
                aula.appendChild(imagem);
                textoAula.appendChild(audio);
                audio.setAttribute('id','audio');
                audio.setAttribute('src', 'cursos/60/".$i2."/audio/'+i6+'.mp3');
                imagem.setAttribute('src', 'cursos/60/".$i2."/img/'+i6+'.jpg');
                imagem.setAttribute('id', 'imagemEstilo');
                textoAula.appendChild(prox);
                textoAula.appendChild(vol);
                textoAula.appendChild(sair);
                audio.setAttribute('controls', 'autoplay');
                prox.disabled = true;
                audio.play();
                audio.addEventListener('ended', function(){
                    audio.currentTime = 0;
                    prox.disabled = false;
                    });
                document.getElementById('sair').style.display = 'block';
                document.getElementById('aulaEstilo').style.display = 'block';
                document.getElementById('60".$i2."'+i6+'').style.display = 'block';
                let paragrafo = document.createElement('p');
                paragrafo.setAttribute('id', 'paragrafo');
                paragrafo.innerHTML = document.getElementById('60".$i2."'+i6+'').innerHTML;
                textoAula.appendChild(paragrafo);
                }
                </script>";
              
            echo "<script>
            function prox".$c['ID_Curso']."aula".$i2."(){
                if(i6<".$i5[$i2]."){
                console.log(i6);
                console.log(document.getElementById('60".$i2."'+i6+''));
                document.getElementById('60".$i2."'+i6+'').style.display = 'none';
                i6++;
                if(i6 == ".$i5[$i2]."){
                    alert('Aula Concluída');
                    i6--;
                    document.getElementById('passo".$i2."".$c['ID_Curso']."').style.pointerEvents = 'auto';
                    document.getElementById('passo".$i2."".$c['ID_Curso']."').style.color = 'green';
                    document.getElementById('passo".$i2."".$c['ID_Curso']."').style.cursor = 'pointer';
                    document.getElementById('fixacao".$i2."".$c['ID_Curso']."').style.pointerEvents = 'auto';
                    document.getElementById('fixacao".$i2."".$c['ID_Curso']."').style.color = 'green';
                    document.getElementById('fixacao".$i2."".$c['ID_Curso']."').style.cursor = 'pointer';
                    document.getElementById('teste".$i2."".$c['ID_Curso']."').style.pointerEvents = 'auto';
                    document.getElementById('teste".$i2."".$c['ID_Curso']."').style.color = 'green';
                    document.getElementById('teste".$i2."".$c['ID_Curso']."').style.cursor = 'pointer';
                    sair".$c['ID_Curso']."aula".$i2."();
                }
                document.getElementById('paragrafo').innerHTML = document.getElementById('60".$i2."'+i6+'').innerHTML;
                document.getElementById('60".$i2."'+i6+'').style.display = 'block';
                document.getElementById('imagemEstilo').setAttribute('src', 'cursos/60/".$i2."/img/'+i6+'.jpg');
                document.getElementById('audio').setAttribute('src', 'cursos/60/".$i2."/audio/'+i6+'.mp3');
                audio.play();document.getElementById('prox".$c['ID_Curso']."aula".$i2."').disabled = true;
                }
            }</script>";
            echo "<script>function vol".$c['ID_Curso']."aula".$i2."(){
                document.getElementById('60".$i2."'+i6+'').style.display = 'none';
                if(i6>0){
                    console.log(i6);
                    document.getElementById('60".$i2."'+i6+'').style.display = 'none';
                    i6--;
                    document.getElementById('60".$i2."'+i6+'').style.display = 'block';
                    document.getElementById('paragrafo').innerHTML = document.getElementById('60".$i2."'+i6+'').innerHTML;
                    document.getElementById('imagemEstilo').setAttribute('src', 'cursos/60/".$i2."/img/'+i6+'.jpg');
                    document.getElementById('audio').setAttribute('src', 'cursos/60/".$i2."/audio/'+i6+'.mp3');
                    audio.play();document.getElementById('prox".$c['ID_Curso']."aula".$i2."').disabled = false;

                }
            
            }</script>";
            echo "<script>
            function sair".$c['ID_Curso']."aula".$i2."(){
            console.log(document.getElementById('60".$i2."'+i6+''));
            document.getElementById('60".$i2."'+i6+'').style.display = 'none';
            document.getElementById('nav').style.display = 'flex';
            document.getElementById('h1curso').style.display = 'flex';
            document.getElementsByClassName('usuarioDiv')[0].style.display = 'flex';
            document.getElementById('cursos').style.display = 'flex';document.getElementById('aulaEstilo').remove();i6=0;}
            </script>";
            }   
            $i++;
        }
        while($i>0){
            echo "<script>adcElemento()</script>";
            $i--;
        }
        while($i3>0){
            echo "<script>adcCurso();</script>";
            $i3--;
        }
    ?>      
    </div>
</body>
</html>