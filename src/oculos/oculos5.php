<?php


session_start();


if (isset($_GET['adicionar'])) {
  
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        
        header("Location: ../php/login.php");
        exit;
    } else {
    
        $nameproduto = (string) $_GET['adicionar'];

      
        if (isset($_SESSION['carrinhos'][$nameproduto])) {
           
            $_SESSION['carrinhos'][$nameproduto]['quantidade']++;
        } else {

            $_SESSION['carrinhos'][$nameproduto] = array(
                'nome' => $nameproduto,
                'quantidade' => 1,
                'valor' => 680.00,
                'imagem' => "../imagens/grau5.png" 
            );
        }

       
        $_SESSION['produto_adicionado'] = true;
    }
}

?>


<script>

  <?php if (isset($_SESSION['produto_adicionado']) && $_SESSION['produto_adicionado'] === true): ?>
    alert("Produto adicionado ao carrinho!");
    <?php
  
    unset($_SESSION['produto_adicionado']);
    ?>
  <?php endif; ?>
</script>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <div class="container-fluid">
    <a href="../php/index.php" class="navbar-brand">
      <img src="../imagens/logo.png" class="logo" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/index.php#best">Óculos de Sol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../php/sobre.php">Quem Somos</a>
        </li>

        <?php
        
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
          echo '<li class="nav-item"><p class="nav-link" style="color: #39FF14; font-weight: bold;">Bem-vindo, ' . $_SESSION["username"] . '!</p></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="../php/login.php">Login</a></li>';
          echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="../php/Cadastro.php">Cadastra-se</a></li>';
        }
        ?>

        <li class="nav-item">
          <a href="../php/cart.php" class="nav-link active position-cart" aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 260 260">
              <path d="m258 50-18.857 79.395C235.702 143.882 222.899 154 208.01 154H93.552l4.504 18.768A15.91 15.91 0 0 0 113.571 185H227v16H113.571a31.86 31.86 0 0 1-31.074-24.498L47.394 30.233A15.91 15.91 0 0 0 31.878 18H2V2h29.878a31.86 31.86 0 0 1 31.074 24.499L68.592 50zM96.649 235c0 12.703 10.297 23 23 23s23-10.297 23-23-10.297-23-23-23-23 10.297-23 23m84 0c0 12.703 10.297 23 23 23s23-10.297 23-23-10.297-23-23-23-23 10.297-23 23" />
            </svg>
          </a>
        </li>

        <li class="nav-item ms-auto  ">
          <form class="d-flex">
            <input class="form-control me-2 cantinhosearch" type="search" placeholder="Procurar" aria-label="Search" style="border-radius: 20px;">
            <button class="btn btn-success" type="submit" style="border-radius: 20px;">Procurar</button>
          </form>
        </li>

        <li class="nav-item dropdown cantinho d-flex align-items-center">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" width="25" height="25">
              <path fill="#7D8590"
                d="m1.5 13v1a.5.5 0 0 0 .3379.4731 18.9718 18.9718 0 0 0 6.1621 1.0269 18.9629 18.9629 0 0 0 6.1621-1.0269.5.5 0 0 0 .3379-.4731v-1a6.5083 6.5083 0 0 0 -4.461-6.1676 3.5 3.5 0 1 0 -4.078 0 6.5083 6.5083 0 0 0 -4.461 6.1676zm4-9a2.5 2.5 0 1 1 2.5 2.5 2.5026 2.5026 0 0 1 -2.5-2.5zm2.5 3.5a5.5066 5.5066 0 0 1 5.5 5.5v.6392a18.08 18.08 0 0 1 -11 0v-.6392a5.5066 5.5066 0 0 1 5.5-5.5z">
              </path>
            </svg>
            Perfil
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Configuração</a></li>
            <li><a class="dropdown-item" href="#">Aparência</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../php/logout.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>




    

<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <!-- Carrossel -->
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 img-fluid img1" src="../imagens/grau5.png" alt="Primeiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid  img1" src="../imagens/Slide2.png" alt="Segundo Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid  img1" src="../imagens/cadastro.png" alt="Terceiro Slide">
          </div>
        </div>
        <a class="carousel-control-prev  " href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon  " aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next  " href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center">
      <h2><strong>Óculos Lumiere</strong></h2>
      <p class="descricao-oculos">
        Os óculos de sol oversized são conhecidos pelo seu tamanho grande, com lentes que cobrem grande parte do rosto. Esse modelo remete ao glamour das décadas de 1960 e 1970.
      </>

      <div class="d-flex gap-3 flex-wrap lado-lado">
        <button class="btn btn-primary btn-lg">Comprar</button>
        <a href="?adicionar=Óculos Lumiere">
          <button class="btn btn-success btn-lg">Adicionar ao Carrinho</button>
        </a>
      </div>
    </div>
  </div>
</div>


  <!--footer-->

  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <div>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="#" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </section>
    <div class="social-login-icons">
      <div class="socialcontainer">
        <div class="social-icon-1">
          <a href="https://twitter.com" target="_blank">
            <svg viewBox="0 0 512 512" height="1.7em" xmlns="http://www.w3.org/2000/svg" class="svgIcontwit"
              fill="white">
              <path
                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
              </path>
            </svg>
          </a>
        </div>
        <div class="social-icon-1">
          <a href="https://twitter.com" target="_blank">
            <svg viewBox="0 0 512 512" height="1.7em" xmlns="http://www.w3.org/2000/svg" class="svgIcontwit"
              fill="white">
              <path
                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
              </path>
            </svg>
          </a>
        </div>
      </div>
      <div class="socialcontainer">
        <div class="social-icon-2">
          <a href="https://www.instagram.com/tato.parfum/" target="_blank">
            <svg fill="white" class="svgIcon" viewBox="0 0 448 512" height="1.5em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
              </path>
            </svg>
          </a>
        </div>
        <div class="social-icon-2">
          <a href="https://www.instagram.com/sheilatirony/" target="_blank">
            <svg fill="white" class="svgIcon" viewBox="0 0 448 512" height="1.5em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
              </path>
            </svg>
          </a>
        </div>
      </div>
      <div class="socialcontainer">
        <div class="social-icon-3">
          <a href="https://facebook.com" target="_blank">
            <svg viewBox="0 0 384 512" fill="white" height="1.6em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z">
              </path>
            </svg>
          </a>
        </div>
        <div class="social-icon-3">
          <a href="https://facebook.com" target="_blank">
            <svg viewBox="0 0 384 512" fill="white" height="1.6em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z">
              </path>
            </svg>
          </a>
        </div>
      </div>
    </div>


    <section class="hidden">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Óculos frx
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="../php/fale.php" class="text-reset">fale Conosco</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Lente de Contatos</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Óculos de Sol</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Óculos De grau</a>
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Bahia, Salvador, Brasil</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
        </div>
      </div>
    </section>
  </footer>


  <!-- redes sociais -->



  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="../codigo-html/index.html">Óculos frx</a>
  </div>
  <!-- Copyright -->
  
  <!-- Footer -->


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>