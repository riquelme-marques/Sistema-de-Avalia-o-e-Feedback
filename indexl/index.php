<?php

session_start();
include_once '../conexao/conexao.php';
if (!isset($_SESSION['idusuario'])) {
    header("location: ../cadastro/index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="X-UA-Compatible" content="IE=7">
      <title>SHAZZ</title>
      <link rel="stylesheet" href="style.css">
      <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  
  </head>
  

<body>
  <header id="header">
    <a id="logo" href="#"><img src="img/logo.png" alt="Logo"></a>
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
        <li><a href="../indexl/index.php">Home</a></li>
        <li><a href="../Avaliação/index.php">Avaliações</a></li>
        <li><a href="../produtosl/index.php">Produtos</a></li>
        <li><a href="../sair/sair.php">Sair</a></li>
        <li><a href="/"> <img id="logo-usuario" src="img/adicionar-usuario.png" alt="imagem-add-usuario"></a></li>
      </ul>
    </nav>

  </header>
  <script src="./script.js"></script>

  <main>

  
    <section class="main-responsive"> 
      <div id="divBusca">
        <img src="img/lupa.png" alt="Buscar..."/>
        <input type="text" id="txtBusca" placeholder="Buscar ..."/>
        <button id="btnBusca"><a href="/"> Buscar </a></button>
      </div>
  
      <div class="logo2">
        <img src="./img/logo.png" alt="Logo">
      </div>
    </section>

    <div class="div-padidemonstracao"> 
   
      <div class="produtodemonstracao">

        <img id="imagem1" src="img/mousem90.webp" alt="Foto mouse">
        <h2> MOUSE M90 </h2>
        <button><a href="../Avaliação/index.html">AVALIE JÁ</a></button>
        
      </div>

      <div class="produtodemonstracao2">

        <img id="imagem2" src="img/tecladomec.webp" alt="Foto mouse">
        <h2> Evolut Assault EG-204RB</h2>
        <button><a href="../Avaliação/index.html">AVALIE JÁ</a></button>
      </div>

      <div class="produtodemonstracao3">

        <img id="imagem2" src="img/mousepad.webp" alt="Foto mouse">
        <h2>  Mouse Pad gamer Havit </h2>
        <button><a href="../Avaliação/index.html">AVALIE JÁ</a></button>
      </div>

    </div>
    



  </main>


  <footer id="footer">

    <p>Nos siga nas redes sociais:</p>

    <ul>

        <li><a href="#"><i class="fa-solid fa-envelope fa-bounce"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-facebook fa-bounce"></i></a></li>
        <li><a href="#"><i class="fa-brands fa-instagram fa-bounce"></i></a></li>
        
    </ul>

</footer>
    

</body>

</html>