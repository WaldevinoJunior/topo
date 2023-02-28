<html>
<head>

</head>
<body>
	<?php
    require_once("validabia.php");
	session_start();
    $id_Curso = $_POST['idcurso'];
    $cupom=$_POST['cupom'];
    $preco=$_POST['preco'];
    $desconto = 0.2;
    $total = ((float)$preco * (float)$desconto);

    echo "<br> Cupom Inserido: ".$cupom.""; 
     $consulta = $mysqli->query("SELECT * from cupons where Codigo='$cupom'");
        while($linha=mysqli_fetch_array($consulta))    {
            if($linha[1]!=0){
                $linha[1]--;
                $result = mysqli_query($mysqli, "UPDATE cupons set Quantidade = '$linha[1]' where codigo = '$cupom' ");
                echo "<br> Resultado: ".$linha[1].""; 
                echo "<br> Prazo: ".$linha[2]."";
                $hoje = date('Y-m-d'); 
                if(($linha[2]==$hoje) || ($linha[2] > $hoje))
                {
                    echo "<br> Data: ".$hoje.""; 
                    if($linha[3]==$id_Curso)
                    {
                        ?>
                 
                            <?php
                    }
        
                }
   
            }
        }

    
?>
        


	
</body>
</html>


	