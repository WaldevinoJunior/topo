<html>

<head>
	<title>Pague com Pix</title>
 	<meta http-equiv= "Content-Type" content= "text/html; charset=iso-8859-1">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="pagcpixstyle2.css"/>
    <link rel="sortcut icon" href="img/pix_icon.png" type="image/png" />

</head>

<body>

	<?php
		include_once("pixheader.php"); 
    include_once("pixfooter.php"); 
    require_once("validabia.php");
session_start();
 $id_curso = $_GET['id'];
 $consulta = $mysqli->query("SELECT * from cursos where ID_Curso='$id_curso'");


while($linha=mysqli_fetch_array($consulta))
{
?>
<script>
     var id_c = "<?php echo $linha[0]; ?>";
    var n = "<?php echo $linha[1]; ?>";
    var p = "<?php echo $linha[2]; ?>";
   const items = [
                {
                    id:id_c,
                    nome:n,
                    quant:0,
                    preco:p,
                    
                
                },
                
            ]
    </script>

<?php 
}




        
?>

	
	<div class="container">
		
		<div class="img-pg">
            
            <div id="cursos">
            
        
            </div>
       
            <div id="carrinho">
         
       
            
            </div>
            
        </div>
    
       
        
         <script> 
            inicializarCompra = () => {
                
                var containerCursos = document.getElementById('cursos');
                items.map((val) => {
                    console.log(val.preco);
                    console.log(val.id);
                    
                    containerCursos.innerHTML+='<div class="produto-single"> <p> Curso de '+val.nome+' </p> <p> Preço: R$'+val.preco+' </p><a class="button" key="'+val.id+'"href="#"> Adicionar ao Carrinho </a> </br> </div>';
                
                })
                
                
            }
            
            inicializarCompra(); 
            
             atualizarCarrinho = () => {
                  var containerCarrinho = document.getElementById('carrinho');
                containerCarrinho.innerHTML = " ";
                 
                items.map((val) => {
                      var total = val.quant * val.preco;
                    containerCarrinho.innerHTML+='<div class="carrinho-single"> <p id="p3"> </p> <p>'+val.nome+' </p> <p>'+val.quant+'un </p> <p id="total"> Total a pagar: R$'+total+' </p>  <form method="post" action="validacupom.php "> <p> <label class="desconto" for="cupom"> Digite um cupom </label> <input id="cupom" name="cupom" type="text" placeholder="PAG-10"/</p> <input type="submit" name="desconto" value="Desconto" /></form> <a class="button" href="finalizapix.php?total"> Continuar </a> </div> </br> </div>';
                    
                })
                
                 
            }
            
             atualizarCarrinho();
            
            var links = document.getElementsByClassName('button');
            for(var i = 0; i < links.length; i++){
                
                links[i].addEventListener("click", function(){
                    let key = this.getAttribute('key');
                    console.log(key);
                    items[0].quant++;
                    atualizarCarrinho();
                    return false;
                    
                    
                    
                    
                })
            }
        </script>
        
        

	</div>
 <!-- <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img src="img/topotreinamentos.png" alt=""></a>
                        </div>
                        <p>O topo é o lugar dos vencedores, dos audases, dos persistentes.
                            Não há lugar no topo para as almas tímidas e frias.</p>
                        <div class="fa-social">
                            <!--<a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>-->
                           <!-- <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa  fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Links Utéis</h4>
                        <ul>
                            <li><a href="./about-us.html">Sobre</a></li>
                            <li><a href="./services.html">Cursos</a></li>
                            <li><a href="./contact.html">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Suporte</h4>
                        <ul>
                            <li><a href="/ead/Sistema/public/index.php">Login</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=5532988725299&text=Quero%20saber%20mais%20informa%C3%A7%C3%B5es!">Whatsapp</a></li>
                            <li><a href="./parte.html">Trabalhe conosco</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="fs-widget">
                        <h4>Dicas</h4>
                        <div class="fw-recent">
                            <h6><a href="#">Guarde seu EPI sempre em local seco e fresco.</a></h6>
                            <ul>
                                <li>cordas</li>
                                <li>cintos</li>
                            </ul>
                        </div>
                        <div class="fw-recent">
                            <h6><a href="#">Revise seu equipamento antes de cada trabalho.</a></h6>
                            <ul>
                                <li>mosquetões</li>
                                <li>freios</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Topo Treinamentos desenvolvido por Davi Guerra</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
     <!--<div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
     <!--<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>  -->


</body>
</html>