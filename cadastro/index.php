<?php

ob_start();
require_once "../conexao/conexao.php";


$u = new Usuario;


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form method="POST" class="sign-in-form">
          <h2 class="title">Entre em sua conta </h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email5" id="email5" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha5" id="senha5" placeholder="Senha" />
          </div>
          <input type="submit" value="Entrar" class="btn solid" />
          <p class="social-text"> Ou entre com outras plataformas:</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form method="POST" class="sign-up-form">
          <h2 class="title">Insira seus dados</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="nome" id="nome" placeholder="Nome" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email2" id="email2" placeholder="Confirmar Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="tel" name="telefone" id="telefone" placeholder="telefone" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha" id="senha" placeholder="Senha" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha2" id="senha2" placeholder="Confirmar Senha" />
          </div>
          <input type="submit" class="btn" value="Cadastrar " />
          <p class="social-text"> Ou entre com outra plataforma: </p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3> Não tem conta? </h3>
          <p>
            clique no botão abaixo e cadastre-se, e faça parte do time. </p>
          <button class="btn transparent" id="sign-up-btn">
            Cadastre-se
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Ja é cadastrado ? </h3>
          <p>
            Clique no botão abaixo e entre em sua conta. </p>
          <button class="btn transparent" id="sign-in-btn">
            Entrar já
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>

  <!-- -------------------------------Cadastrar PHP------------------------------ -->
  <?php

  if (isset($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $email2 = addslashes($_POST['email2']);
    $telefone = addslashes($_POST['telefone']);
    $senha = addslashes($_POST['senha']);
    $senha2 = addslashes($_POST['senha2']);

    if (!empty($nome) && !empty($email)  && !empty($email2)  && !empty($telefone)  && !empty($senha)  && !empty($senha2)) {
      $u->conectar("sa", "localhost", "root", "");
      if ($u->msgErro == "") {
        if ($senha == $senha2) {
          if ($email == $email2) {
            if ($u->cadastrar($nome, $email, $telefone, $senha)) {
  ?>
              <div class="botãoCadSucess">
                Cadastrado com sucesso!!
              </div>
            <?php
            } else {
            ?>
              <div class="botãoCadEmail">
                Email já cadastrado!!
              </div>
            <?php
            }
          } else {
            ?>
            <div class="botãoCadEmail2">
              Email e Confirmar Email não correspondem!!
            </div>
          <?php
          }
        } else {
          ?>
          <div class="botãoCadSenha">
            Senha e Confirmar Senha não correspondem!!
          </div>
      <?php
        }
      } else {
        echo "Erro: " . $u->msgErro;
      }
    } else {
      ?>
      <div class="botãoCadCamp">
        Preencha todos os campos!!
      </div>
  <?php
    }
  }


  ?>

  <!-- --------------------------Login PHP------------------------------------ -->
  <?php

  if (isset($_POST['email5'])) {
    $email5 = addslashes($_POST['email5']);
    $senha5 = addslashes($_POST['senha5']);

    if (!empty($email5) && !empty($senha5))
    {

      $u->conectar("sa", "localhost", "root", "");

      if ($u->msgErro == ""){
      if ($u->logar($email5, $senha5))
      {

        header("location: ../indexl/"); 
        ob_end_flush();
        
      }
      else
      {
        ?>
        <div class="botãoLogin">
          Email e/ou senha incorretos!!
        </div>
    <?php
      }
    }
    else
    {
      echo "Erro: ".$u->msgErro;
    }
    } 
    else 
    {
  ?>
      <div class="botãoLoginCamp">
        Preencha todos os campos!!
      </div>
  <?php
    }
  }


  ?>
</body>

</html>