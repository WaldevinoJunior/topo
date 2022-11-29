<?php
    include("valida.php");
    if(isset($_POST['Enviar'])){
        $email = $mysqli->escape_string($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error[] = "Email errado";
            echo $error;
        }
        if(count($error) == 0){
        $novasenha = substr(md5(time()) ,0,6);
        $novasenhacrip = md5(md5($novasenha));
        if( mail($email, "Sua Nova Senha", "Sua Nova senha é:" .$novasenha)){
            $sql_code = "UPDATE alunos SET Senha = '$novasenhacrip' WHERE Email = '$email' ";
            $sql_query = $mysqli->query($sqli_code) or die($mysqli->error);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Topo Treinamentos">
    <meta name="keywords" content="Escola, cursos, profissionalizante, Topo Treinamentos, Topo treinamentos, treinamentos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topo Treinamentos</title>

    
    <link rel="sortcut icon" href="img/iconetopo.jpg" type="image/jpg" />
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/loginNovo.css" type="text/css">

    
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./about-us.html">A Empresa</a></li>
                <li class="active"><a href="./services.html">Cursos</a></li>
               <!-- <li><a href="https://podiumcursos.ouromoderno.com.br/">Loja Virtual</a></li> -->
                <li><a href="./login.html">Login</a></li>
                <li><a href="./contact.html">Contato</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <!--<a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>-->
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="img/logoo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="./index.html">Home</a></li>
                            <li><a href="./about-us.html">A Empresa</a></li>
                            <li><a href="./services.html">Cursos</a></li>
                           <!--  <li><a href="https://podiumcursos.ouromoderno.com.br/">Loja Virtual</a></li> -->
                            <li class="active"><a href="./login.html">Login</a></li>
                            <li><a href="./contact.html">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            <!--<a href="https://www.facebook.com/grupopodium/"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>-->
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="https://www.instagram.com/topo.treinamentos/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <body>
    <!-- Hero Section Begin -->
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="login-imagem col-12 col-md-4">
                    <img class="img-fluid" src="./img/Logo.png" alt="Grupo Podium Logomarca">
                </div>
                <div class="login-div col-12 col-md-4">
                    <p class="titulo">Digite seu Email</p>
                    <form method="POST" action="esqueci.php">
                        <input type="hidden" name="_token" value="PG9KJSXDEDSJsYlSYuH7Q5ZHBKxbyxqcIOrntZba">
                        <input class="col-12" type="text" name="email" id="email" placeholder="Email" required>
        
                        <input class="col-12" type="submit" name="Enviar" id="submit" value="Enviar">
                    </form>
                        <a href="./login.html">Voltar</a>
                </div>
                
                <div class="col-12 col-md-8 p-0 mt-2">
                </div>
            </div>
        </div> 
    </section>
                                           
                               <!-- <a href="#" class="primary-btn">Saiba Mais</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>