<html>

<head>
	<title>Pague com Pix</title>
 	<meta http-equiv= "Content-Type" content= "text/html; charset=iso-8859-1">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="pagcpixstyle4.css"/>
    <link rel="sortcut icon" href="img/pix_icon.png" type="image/png" />

</head>

<body>

	<?php
		include_once("pixheader.php"); 
    if(isset($_GET['id_curso'])){
    $id_Curso = $_GET['id_curso'];
    }
    if(isset($_GET['total']))
    {
    $total = $_GET['total'];
    }
        if(isset($_GET['totalsdesc']))
    {
        $total= $_GET['totalsdesc'];
    
        
    }    ?>
    
    


 
	<div class="container">
		
		<div class="img-pg">
            
                <div class="qrcode-single">
                    <?php
                    
                    echo "<br> Valor Final: R$".$total."";
                    
                    
                    ?>
    <p> Para realizar o pagamento, aponte a câmera do seu smartphone para o QR Code abaixo: </p>  
                
             <img id="qrcode" src="img/qrcode.jpeg"/>
<br>
<p> Ou utilize a chave pix: (CNPJ) 04.880.821/0001-10 </p>
            </div>
            
    <div class="pagamento">   
      <!--FORMULÁRIO DE DADOS PARA CADASTRO-->
      <form method="post" action="mailto:beatriz.trindade.work@gmail.com"> 
          <p>Para finalizar, preencha com as credenciais de login desejadas:</p> 
          
          <p> 
            <label for="nome">Nome </label>
            <input id="nome" name="nome" required="required" type="text" placeholder="Pedro Souza" /> 
          </p>
	    <p> 
            <label for="email">E-mail </label>
            <input id="email" name="email" required="required" type="email" placeholder="pedrosouza@gmail.com"/>
          </p>
           
          <p> 
            <label for="tel">Telefone </label>
              <input id="tel" name="tel" required="required" type="tel" placeholder="" /> 
          </p>
          
          <p> 
            <label for="login">Login </label>
              <input id="login" name="login" required="required" type="text" placeholder="pedro" /> 
          </p>
          
          <p> 
            <label for="senha">Senha </label>
              <input id="senha" name="senha" required="required" type="password" placeholder="pedro1234" /> 
          </p>
           <br>
          <p> 
            <input type="submit" name="cadastrar" value="Cadastrar" /> 
          </p>
           
 
</form>


            </div>
                
        
            </div>
       
     
        

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